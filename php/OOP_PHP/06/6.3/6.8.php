<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class base
  {
    public static $staticvar = 0;
  }
  class derived extends base
  {
    public static $staticvar = 0;
    public function __construct()
    {
      parent::$staticvar = 100;
    }
  }
  $obj = new derived();

  derived::$staticvar = 20;
  echo base::$staticvar."<br>"; // 100
  echo derived::$staticvar."<br>"; // 20
?>
