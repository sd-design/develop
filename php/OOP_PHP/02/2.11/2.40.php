<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем объявление класса
  require_once("class.point.php");

  // Массив объектов point
  $arr = array(point::get_point(1, 1),
               point::get_point(2, 2),
               point::get_point(3, 0),
               point::get_point(4, 5));

  // Выводим дамп объекта
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
?>
