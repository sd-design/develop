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

  if(empty($_POST))
  {
    // Отмечам флажок hide
    $_REQUEST['hide'] = true;
  }
  $name        = new field_text("name",
                                "Название",
                                true,
                                $_POST['name']);
  $body = new field_textarea("body",
                             "Содержимое",
                             true,
                             $_POST['body']);
  $url         = new field_text("url",
                                "Ссылка",
                                false,
                                $_POST['url']);
  $urltext    = new field_text("urltext",
                               "Текст ссылки",
                                false,
                                $_POST['urltext']);
  $date        = new field_datetime("date",
                                "Дата новости",
                                $_POST['date']);
  $hide        = new field_checkbox("hide",
                             "Отображать",
                             $_REQUEST['hide']);
  $urlpict   = new field_file("urlpict",
                               "Изображение",
                               false,
                               $_FILES,
                               "../../files/news/");
  $page    = new field_hidden_int("page",
                                     "",
                                     true,
                                     $_REQUEST['page']);

  try
  {
    $form = new form(array("name" => $name, 
                           "body" => $body, 
                           "url" => $url,
                           "urltext" => $urltext,
                           "date" => $date,
                           "hide" => $hide,
                           "urlpict" => $urlpict,
                           "page" => $page), 
                     "Добавить",
                     "field");
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
        // Изображение
        $str = $form->fields['urlpict']->get_filename();
        if(!empty($str))
        {
          $img = "files/news/".$form->fields['urlpict']->get_filename();
        }
        else $img = '';
        // Формируем SQL-запрос на добавление позиции
        $query = "INSERT INTO $tbl_news
                  VALUES (NULL,
                          '{$form->fields[name]->value}',
                          '{$form->fields[body]->value}',
                          '{$form->fields[date]->get_mysql_format()}',
                          '{$form->fields[url]->value}',
                          '{$form->fields[urltext]->value}',
                          '$img',
                          '$showhide')";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "Ошибка добавления новостной
                                   позиции");
        }
        // Осуществляем редирект на главную страницу администрирования
        header("Location: index.php?page={$form->fields[page]->value}");
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