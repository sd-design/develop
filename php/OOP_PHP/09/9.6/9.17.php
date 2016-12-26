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

  // Создаем объект класса example
  $exp = new example(1, 2, 3);
  // Получаем отражение метода
  $obj = new ReflectionMethod($exp, "helloWorld");
  // Осуществляем неявное выполнение метода
  echo $obj->invoke($exp);
?>
