<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class cls
  {
    public $name;
    public $arr;
  }

  $obj = new cls();
  $obj->name = "name";
  $obj->arr = array("first", "second", "third", "fourth");

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
