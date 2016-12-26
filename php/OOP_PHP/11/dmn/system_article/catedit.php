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

  $_GET['id_catalog'] = intval($_GET['id_catalog']);
  if(empty($_POST))
  {
    try
    {
      $query = "SELECT * FROM $tbl_catalog
                WHERE id_catalog=$_GET[id_catalog]
                LIMIT 1";
      $cat = mysql_query($query);
      if(!$cat)
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                "Ошибка при обращении 
                                 каталогу");
      }
      $_REQUEST = mysql_fetch_array($cat);
      $_REQUEST['page'] = $_GET['page'];
      if($_REQUEST['hide'] == 'show') $_REQUEST['hide'] = true;
      else $_REQUEST['hide'] = false;
    }
    catch(ExceptionMySQL $exc)
    {
      require("../utils/exception_mysql.php"); 
    }
  }

  $name = new field_text("name",
                         "Название",
                         true,
                         $_REQUEST['name']);
  $description = new field_textarea("description",
                               "Описание",
                               false,
                               $_REQUEST['description']);
  $keywords = new field_text("keywords",
                             "Ключевые слова",
                             false,
                             $_REQUEST['keywords']);
  $modrewrite = new field_text_english("modrewrite",
                             "Название для<br>ReWrite",
                             false,
                             $_REQUEST['modrewrite']);
  $hide = new field_checkbox("hide",
                             "Отображать",
                             $_REQUEST['hide']);
  $id_catalog = new field_hidden_int("id_catalog",
                               true,
                               $_REQUEST['id_catalog']);
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
                            "id_catalog" => $id_catalog,
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
        // Скрытый или открытый каталог
        if($form->fields['hide']->value) $showhide = "show";
        else $showhide = "hide";
        // Формируем SQL-запрос на добавление каталога
        $query = "UPDATE $tbl_catalog
                  SET name        = '{$form->fields[name]->value}',
                      description = '{$form->fields[description]->value}',
                      keywords    = '{$form->fields[keywords]->value}',
                      modrewrite  = '{$form->fields[modrewrite]->value}',
                      hide        = '$showhide'
                  WHERE id_catalog = {$form->fields[id_catalog]->value}";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "Ошибка при редактировании 
                                   подкаталога");
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
  $title     = 'Редактирование подменю';
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