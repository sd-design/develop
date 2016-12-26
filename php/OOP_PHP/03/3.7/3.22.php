<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class/class.employee.php");
  require_once("class/class.client.php");
  require_once("class/class.contract.php");

  if(class_exists("employee"))
    echo "Класс employee существует<br>";
  else
    echo "Класс employee не существует<br>";

  if(class_exists("client"))
    echo "Класс client существует<br>";
  else
    echo "Класс client не существует<br>";

  if(class_exists("contract"))
    echo "Класс contract существует<br>";
  else
    echo "Класс contract не существует<br>";

  if(class_exists("none"))
    echo "Класс none существует<br>";
  else
    echo "Класс none не существует<br>";
?>
