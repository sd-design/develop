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

  $obj = new cls();
  if(method_exists("cls", "public_print"))
    echo "Метод cls::public_print() существует<br>";
  else
    echo "Метод cls::public_print() не существует<br>";

  if(method_exists("cls", "private_print"))
    echo "Метод cls::private_print() существует<br>";
  else
    echo "Метод cls::private_print() не существует<br>";

  if(method_exists("cls", "print"))
    echo "Метод cls::print() существует<br>";
  else
    echo "Метод cls::print() не существует<br>";
?>
