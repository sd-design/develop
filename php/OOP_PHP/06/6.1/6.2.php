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
     public static $staticvar = 100;
     public function set_staticvar($val)
     {
       $this->staticvar = $val;
     }
  }

  $obj = new cls();

  echo "<pre>";
  print_r($obj);
  echo "</pre>";

  $obj->set_staticvar(20);
  
  echo cls::$staticvar; // 100

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
