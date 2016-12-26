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

  // Параметры
  $button_name = "Редактировать";
  $class_name = "field";

  $_GET['id_position'] = intval($_GET['id_position']);
  $_GET['id_catalog']  = intval($_GET['id_catalog']);
  if(empty($_POST))
  {
    try
    {
      $query = "SELECT * FROM $tbl_position
                WHERE id_catalog=$_GET[id_catalog] AND
                      id_position=$_GET[id_position]
                LIMIT 1";
      $pos = mysql_query($query);
      if(!$pos)
      {
        throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "Ошибка при обращении 
                               к позиции");
      }
      $_REQUEST = mysql_fetch_array($pos);
      $_REQUEST['page'] = $_GET['page'];
      if($_REQUEST['hide'] == 'show') $_REQUEST['hide'] = true;
      else $_REQUEST['hide'] = false;
    }
    catch(ExceptionMySQL $exc)
    {
      require("../utils/exception_mysql.php"); 
    }
  }

  // Поле name для ввода имени формы
  $name = new field_text("name",
                         "Название",
                         true,
                         $_REQUEST['name']);
  // Поле name для ввода имени формы
  $url = new field_text("url",
                         "Название",
                         true,
                         $_REQUEST['url']);
  // Поле для ключевых слов
  $keywords = new field_text("keywords",
                             "Ключевые слова",
                             false,
                             $_REQUEST['keywords']);
  // Поле для ключевых слов
  $modrewrite = new field_text_english("modrewrite",
                             "Название для<br>ReWrite",
                             false,
                             $_REQUEST['modrewrite']);
  // Отображать
  $hide = new field_checkbox("hide",
                             "Отображать",
                             $_REQUEST['hide']);
  // Через скрытое поле передаём первичный ключ
  $id_catalog = new field_hidden_int("id_catalog",
                               true,
                               $_REQUEST['id_catalog']);
  // Через скрытое поле передаём первичный ключ
  $id_position = new field_hidden_int("id_position",
                               true,
                               $_REQUEST['id_position']);
  // Параметр page
  $page = new field_hidden_int("page",
                               false,
                               $_REQUEST['page']);
  try
  {
    $form = new form(array("name" => $name,
                            "url" => $url,
                            "keywords" => $keywords, 
                            "modrewrite" => $modrewrite, 
                            "hide" => $hide,
                            "modrewrite" => $modrewrite,
                            "id_catalog" => $id_catalog,
                            "id_position" => $id_position,
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
        // Скрытый или открытая позиция
        if($form->fields['hide']->value) $showhide = "show";
        else $showhide = "hide";
        // Формируем SQL-запрос на добавление позиции
        $query = "UPDATE $tbl_position
                  SET name = '{$form->fields[name]->value}',
                      url = '{$form->fields[url]->value}',
                      keywords = '{$form->fields[keywords]->value}',
                      modrewrite = '{$form->fields[modrewrite]->value}',
                      hide = '$showhide'
                  WHERE id_position = {$form->fields[id_position]->value} AND
                        id_catalog ={$form->fields[id_catalog]->value}";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                "Ошибка при редактировании 
                                 позиции");
        }

        // Осуществляем редирект на главную страницу администрирования
        header("Location: index.php?".
               "id_parent={$form->fields[id_catalog]->value}&".
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
  $title     = 'Редактирование позиции';
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