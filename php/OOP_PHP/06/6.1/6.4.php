<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.counter.php");

  $obj = new counter();
  echo counter::$count."<br>"; // 1

  for($i = 0; $i < 3; $i++)
  {
    $arr[] = new counter();
    echo counter::$count."<br>"; // 2, 3, 4
  }

  // Уничтожаем массив объектов
  unset($arr);

  echo counter::$count."<br>"; // 1
?>
