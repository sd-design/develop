<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.cls.php");

  if(defined("cls::NAME")) echo "Константа определена<br>"; // true
  else echo "Константа не определена<br>";

  if(defined("cls::POSITION")) echo "Константа определена<br>"; // false
  else echo "Константа не определена<br>";
?>
