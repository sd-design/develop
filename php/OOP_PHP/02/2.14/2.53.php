<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.employee.php");

  $emp = new employee();
  $emp->init_object("Борисов", "Игорь", "Иванович");

  echo "<pre>";
  print_r($emp);
  echo "</pre>";

  $obj = new employee();
  $obj->init_object("Егоров");

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
