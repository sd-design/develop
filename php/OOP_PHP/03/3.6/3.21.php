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

  $emp = new client("Борисов", "Игорь", "Иванович");
  $cnt = new employee("Корнеев", "Иван", "Григорьевич");
  $obj = new contract(time(), 
                      time() + 30*24*60*60, 
                      "Описание", 
                      "10000", 
                      "Борисов", 
                      "Игорь", 
                      "Иванович",
                      "Корнеев",
                      "Иван",
                      "Григорьевич");
?>
