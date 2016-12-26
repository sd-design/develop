<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Включаем заголовок страницы
  require_once("utils/top.php");

  // Подключаем все необходимые классы
  require_once("config.php");

  try
  {
    $query = "SELECT * FROM users";
    $usr = mysql_query($query);
    if(!$usr) 
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                               "Ошибка обращения к списку пользователей");

    // Если имеется хотя бы одна запись
    // выводим список пользователей
    if(mysql_num_rows($usr))
    {
      while($user = mysql_fetch_array($usr))
      {
        echo "<a href=edituser.php?id_user=$user[id_user]>".
                htmlspecialchars($user['name'], ENT_QUOTES).
             "</a><br>";
      }
    }
  }
  catch(ExceptionMySQL $exc) { require("exception_mysql.php"); }

  // Включаем завершение страницы
  require_once("utils/bottom.php");
?>