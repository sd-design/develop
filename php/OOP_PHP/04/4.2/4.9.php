<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем базовый и производный классы
  require_once("class.base.php");

  // Объявляем объект базового класса
  $bobj = new base();

  // Члены и методы базового класса
  echo "<pre>";
  print_r($bobj);
  print_r(get_class_methods($bobj));
  echo "</pre>";

  // Объявляем объект производного класса
  $dobj = new derived();

  // Члены и методы производного класса
  echo "<pre>";
  print_r($dobj);
  print_r(get_class_methods($dobj));
  echo "</pre>";
?>
