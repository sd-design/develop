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

  // Получаем отражение класса
  $obj = new ReflectionClass("example");

  // Получаем отражение члена $second
  $snd = $obj->getProperty("second");
  // Устанавливаем значение
  $snd->setValue($exp, 100);
  // Выводим новое значение
  echo $exp->second; // 100
?>
