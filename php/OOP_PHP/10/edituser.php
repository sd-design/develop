<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  try
  {
    // Подключаем все необходимые классы
    require_once("config/class.config.php");
  
    // Параметры формы
    $button_name = "Добавить";
    $class_name = "field";
  
    // Если это первое обращение к HTML-форме
    // извлекаем информацию из таблицы users
    if(empty($_POST))
    {
      $_GET['id_user'] = intval($_GET['id_user']);

      // Устанавливаем соединение с базой данных
      require_once("config.php");

      $query = "SELECT * FROM users 
                WHERE id_user = $_GET[id_user]";
      $usr = mysql_query($query);
      if(!$usr)
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                 "Ошибка извлечения данных пользователя");
      }
      $_REQUEST = mysql_fetch_array($usr);
      $_REQUEST['pass_again'] = $_REQUEST['pass'];
    }
  
    //////////////////////////////////////////
    // 1. Формирование HTML-формы
    //////////////////////////////////////////
    $pass = new field_password("pass",
                           "Пароль",
                            true,
                            $_REQUEST['pass']);
    $pass_again = new field_password("pass_again",
                           "Повтор пароля",
                            true,
                            $_REQUEST['pass_again']);
    $email = new field_text_email("email",
                           "E-mail",
                            true,
                            $_REQUEST['email']);
    $description = new field_textarea("description",
                           "О себе",
                            false, // Поле не обязательное
                            $_REQUEST['description']);
    $id_user = new field_hidden_int("id_user",
                                    true,
                                    $_REQUEST['id_user']);
    try
    {
      $form = new form(array("pass"        => $pass,
                             "pass_again"  => $pass_again,
                             "email"       => $email,
                             "description" => $description,
                             "id_user"     => $id_user),
                       $button_name,
                       $class_name);
    }
    catch(ExceptionObject $exc) { require("exception_object.php"); }
  
    //////////////////////////////////////////
    // 2. Обработчик HTML-формы
    //////////////////////////////////////////
    if(!empty($_POST))
    {
      try
      {
        // Устанавливаем соединение с базой данных
        require_once("config.php");
        // Проверяем корректность заполнения HTML-формы
        // и обрабатываем текстовые поля
        $error = $form->check();
  
        // Проверяем равны ли пароли
        if($form->fields['pass']->value != 
           $form->fields['pass_again']->value)
        {
          $error[] = "Пароли не равны";
        }
        // Проверяем не регистрировался ли ранее пользователь
        // с запрашиваемым электронным адресом
        $query = "SELECT COUNT(*) FROM users
                  WHERE email = '{$form->fields[email]->value}'";
        $mal = mysql_query($query);
        if(!$mal)
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                   "Ошибка обновления 
                                    пользовательских данных");
        }
        if(mysql_result($mal, 0))
        {
          $error[] = "Пользователь с электронным адресом
                     {$form->fields[email]->value} уже
                     зарегистрирован";
        }
  
        if(empty($error))
        {
          // Обновляем запись пользователя
          $query = "UPDATE users 
                    SET pass = MD5('{$form->fields[pass]->value}'),
                        email = '{$form->fields[email]->value}',
                        description = '{$form->fields[description]->value}'
                    WHERE id_user = {$form->fields[id_user]->value}";
          if(!mysql_query($query))
          {
            throw new ExceptionMySQL(mysql_error(), 
                                     $query,
                                     "Ошибка обновления 
                                      пользовательских данных");
          }
  
          // Перегружаем страницу, для сброса POST-данных
          header("Location: list.php");
  
          exit();
        }
      }
      catch(ExceptionMember $exc) { require("exception_member.php"); }
    }
  }
  catch(ExceptionMySQL $exc) { require("exception_mysql.php"); }

  //////////////////////////////////////////
  // 3. Видимая часть страницы
  //////////////////////////////////////////
  // Включаем заголовок страницы
  require_once("utils/top.php");
  
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
  require_once("utils/bottom.php");
?>
