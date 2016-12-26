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
  if(property_exists($obj, "surname"))
    echo "Член employee::surname существует<br>";
  else
    echo "Член employee::surname не существует<br>";

  if(property_exists($obj, "name"))
    echo "Член employee::name существует<br>";
  else
    echo "Член employee::name не существует<br>";

  if(property_exists($obj, "patronymic"))
    echo "Член employee::patronymic существует<br>";
  else
    echo "Член employee::patronymic не существует<br>";

  if(property_exists($obj, "age"))
    echo "Член employee::age существует<br>";
  else
    echo "Член employee::age не существует<br>";

  if(property_exists($obj, "none"))
    echo "Член employee::none существует<br>";
  else
    echo "Член employee::none не существует<br>";
?>
