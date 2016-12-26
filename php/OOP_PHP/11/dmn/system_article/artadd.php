<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подлкючаем блок авторизации
  require_once("../utils/security_mod.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");

  // Защита от SQL-инъекции
  $_GET['id_parent'] = intval($_GET['id_parent']);
  // Параметры
  $button_name = "Добавить";
  $class_name = "field";

  if(empty($_POST)) $_REQUEST['hide'] = true;
  $name = new field_text("name",
                         "Название",
                         true,
                         $_POST['name']);
  $description = new field_textarea("description",
                               "Содержимое статьи",
                               true,
                               $_POST['description']);
  $keywords = new field_text("keywords",
                             "Ключевые слова",
                             false,
                             $_POST['keywords']);
  $modrewrite = new field_text_english("modrewrite",
                             "Название&nbsp;для<br>ReWrite",
                             false,
                             $_POST['modrewrite']);
  $hide = new field_checkbox("hide",
                             "Отображать",
                             $_REQUEST['hide']);
  $id_parent = new field_hidden_int("id_parent",
                               true,
                               $_REQUEST['id_parent']);
  $page = new field_hidden_int("page",
                               false,
                               $_REQUEST['page']);
  try
  {
    $form = new form(array("name" => $name,
                            "description" => $description, 
                            "keywords" => $keywords, 
                            "modrewrite" => $modrewrite, 
                            "hide" => $hide,
                            "modrewrite" => $modrewrite,
                            "id_parent" => $id_parent,
                            "page" => $page), 
                            $button_name,
                            $class_name);
  }
  catch(ExceptionObject $exc) 
  {
    require("../utils/exception_object.php"); 
  }

  // Обработчик HTML-формы
  if(!empty($_POST))
  {
    try
    {
      // Проверяем корректность заполнения HTML-формы
      // и обрабатываем текстовые поля
      $error = $form->check();
      if(empty($error))
      {
        // Извлекаем текущую максимальную позицию
        $query = "SELECT MAX(pos) FROM $tbl_position
                  WHERE id_catalog = {$form->fields[id_parent]->value}";
        $pos = mysql_query($query);
        if(!$pos)
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "Ошибка при извлечении 
                                   текущей позиции");
        }
        $pos = mysql_result($pos, 0) + 1;
        // Скрытый или открытая позиция
        if($form->fields['hide']->value) $showhide = "show";
        else $showhide = "hide";
        // Формируем SQL-запрос на добавление позиции
        $query = "INSERT INTO $tbl_position
                  VALUES (NULL,
                          '{$form->fields[name]->value}',
                          'article',
                          '{$form->fields[keywords]->value}',
                          '{$form->fields[modrewrite]->value}',
                           $pos,
                          '$showhide',
                          {$form->fields[id_parent]->value})";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "Ошибка при добавлении
                                   новой позиции");
        }
        // Извлекаем значение первичного ключа, только
        // что вставленной записи, назначенного механизмом
        // AUTO_INCREMENT
        $id_position = mysql_insert_id();
        // Разбиваваем текст на параграфы
        $par = preg_split("|\r\n|", 
                          $form->fields['description']->value);
        if(!empty($par))
        {
          $i = 0;
          foreach($par as $parag)
          {
            $i++;
            $sql[] = "(NULL,
                       '$parag',
                       'text',
                       'left',
                       'show',
                       $i,
                       $id_position, 
                       {$form->fields[id_parent]->value})";
          }
          $query = "INSERT INTO $tbl_paragraph 
                    VALUES ".implode(",",$sql);
          if(!mysql_query($query))
          {
            throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "Ошибка при добавлении 
                                   новой позиции");
          }
        }
        // Осуществляем редирект на главную страницу администрирования
        header("Location: index.php?".
               "id_parent={$form->fields[id_parent]->value}&".
               "page={$form->fields[page]->value}");
        exit();
      }
    }
    catch(ExceptionMySQL $exc)
    {
      require("../utils/exception_mysql.php"); 
    }
  }
  // Начало страницы
  $title     = 'Добавление позиции';
  $pageinfo  = '<p class=help></p>';
  // Включаем заголовок страницы
  require_once("../utils/top.php");
  
  echo "<p><a href=# onClick='history.back()'>Назад</a></p>";
  // Выводим сообщения об ошибках если они имеются
  if(!empty($error))
  {
    foreach($error as $err)
    {
      echo "<span style=\"color:red\">$err</span><br>";
    }
  }
  // Выводим HTML-форму 
  $form->print_form();

  // Включаем завершение страницы
  require_once("../utils/bottom.php");
?>