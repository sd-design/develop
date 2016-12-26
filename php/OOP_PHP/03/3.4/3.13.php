<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем реализацию класса cls
  require_once("class.cls.php");

  for($i = 0; $i < 3; $i++)
  {
    $obj = new cls();
    $obj->__destruct();
  }
  echo "Произвольный текст<br>";
?>
