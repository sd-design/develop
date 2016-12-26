<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем реализацию класса
  require_once("class.cls.php");
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Извлекаем из таблицы object 
  // объект с идентификатором 1
  $query = "SELECT * FROM object WHERE id_object = 1";
  $obj = mysql_query($query);
  if(!$obj) exit("Ошибка извлечения объекта из таблицы");
  // Если запись найдена - обрабатываем ее
  if(mysql_num_rows($obj))
  {
    $table = mysql_fetch_array($obj);
    // Восстанавливаем объект
    $object = unserialize($table['object']);
    // Выводим дамп объекта
    echo "<pre>";
    print_r($object);
    echo "</pre>";
  }
?>
