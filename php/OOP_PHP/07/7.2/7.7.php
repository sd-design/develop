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
    public $var;
    public function __construct()
    {
      $this->var = 100;
    }
    public function __clone()
    {
      $this->var = "Клон";
    }
  }

  $obj = new cls();
  $new_obj = clone $obj;
  echo $new_obj->var; // Клон
  echo $obj->var; // 100
?>
