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
    const NAME = "cls";
    public function method()
    {
      // echo $this->NAME; // Ошибочное обращение
      echo self::NAME;
      echo "<br>";
      echo cls::NAME;
      echo "<br>";
    }
  }
  
  echo cls::NAME;
?>
