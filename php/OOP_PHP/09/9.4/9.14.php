<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.example.php");

  // Получаем отражение класса
  $obj = new ReflectionClass("example");

  // Выводим список статических членов класса
  echo "<pre>";
  print_r($obj->getStaticProperties());
  echo "</pre>";

  // Устанавливаем новое значение статическому
  // члену класса count
  $obj->setStaticPropertyValue("count", 100);

  // Выводим значение статического члена класса
  // count
  echo $obj->getStaticPropertyValue("count");

?>
