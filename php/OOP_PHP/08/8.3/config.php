<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Адерс сервера MySQL
  $dblocation = "localhost";
  // Имя базы данных на хостинге или локальной машине
  $dbname = "oop";
  // Имя пользователя базы данных
  $dbuser = "root";
  // и его пароль
  $dbpasswd = "";

  // Определяем константы для кодов исключения
  define("NOT_CONNECTION", 0);
  define("NOT_DATABASE", 1);

  // Устанавливаем соединение с базой данных
  $dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);
  if (!$dbcnx)
  {
    throw new Exception("Невозможно установить 
                         соединение с сервером MySQL ",
                         NOT_CONNECTION);
  }
  // Выбираем базу данных
  if (! @mysql_select_db($dbname, $dbcnx) )
  {
    throw new Exception("Ошибка выбора базы данных", NOT_DATABASE);
  }

  // Устанавливаем кодировку соединения; следует выбрать ту кодировку,
  // в которой данные будут отправляться серверу MySQL 
  @mysql_query("SET NAMES 'cp1251'");
?>
