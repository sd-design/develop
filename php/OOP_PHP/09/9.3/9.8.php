<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("function.hello.php");

  // Получаем отражение функции
  $obj = new ReflectionFunction("hello");
  // Получаем массив объектов отражений 
  // параметров функции
  $arr = $obj->getParameters();
  // В цикле обрабатываем отражения
  // параметров
  foreach($arr as $par)
  {
    // Выводим название очередного
    // параметра
    echo $par->getName()."<br>";
  }
?>
