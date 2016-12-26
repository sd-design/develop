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
  require_once("config.php");

  // Определяем константы для кодов исключения
  define("SQL_ERROR", 100);
  define("NONE_RECORDS", 101);

  function print_user()
  {
    $query = "SELECT * FROM object_user";
    $usr = mysql_query($query);
    // Генерируем исключение в случае
    // ошибки выполнения SQL-запроса
    if(!$usr) throw new Exception(mysql_error(), SQL_ERROR);
    // Генерируем исключение, если в 
    // таблице нет ни одной записи
    if(!mysql_num_rows($usr))
    {
      throw new Exception("Отсутствуют записи в таблице", NONE_RECORDS);
    }

    // Выводим список пользователей
    while($user = mysql_fetch_array($usr))
    {
      echo $user['name']."<br>";
    }
  }
?>
