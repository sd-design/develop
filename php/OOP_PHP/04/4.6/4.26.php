<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.base.php");
  require_once("class.derived.php");
  require_once("class.postderived.php");

  $obj = new base();
  if(is_subclass_of($obj, "base")) echo "yes<br>"; // false
  else echo "no<br>";

  $obj = new derived();
  if(is_subclass_of($obj, "base")) echo "yes<br>"; // true
  else echo "no<br>";

  $obj = new postderived();
  if(is_subclass_of($obj, "base")) echo "yes<br>"; // true
  else echo "no<br>";
?>
