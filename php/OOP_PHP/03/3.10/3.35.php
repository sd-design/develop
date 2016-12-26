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

  $obj = new employee("Борисов", "Игорь", "Иванович");
  if(isset($obj->surname)) $obj->surname = "Абрамов"; // true
  else echo "Отсутствует член класса<br>";
  if(isset($obj->surname1)) $obj->surname1 = "Абрамов"; // false
  else echo "Отсутствует член класса<br>";
  echo "{$obj->surname} {$obj->name} {$obj->patronymic}";
?>
