<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class point
  {
    public $x;
    public $y;
  }

  $obj = new point();
  $obj->x = 100;
  $obj->y = 100;

  $fst = $obj;

  unset($obj);

  echo "<pre>";
  print_r($fst); // Объект существует
  echo "</pre>";

  echo "<pre>";
  print_r($obj); // Объект не существует
  echo "</pre>";
?>
