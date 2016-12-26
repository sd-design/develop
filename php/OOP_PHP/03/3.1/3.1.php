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
    private $var;
    public function __construct()
    {
      echo "Вызов конструктора<br>";
      $this->var = 100;
    }
  }

  $obj = new cls();

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
