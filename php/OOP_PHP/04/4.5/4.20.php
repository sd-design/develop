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
    public function print_var()
    {
      echo "Вызов метода print_var() базового класса<br>";
    }
  }
  class derived extends base
  {
    public function print_var()
    {
      echo "Вызов метода print_var() производного класса<br>";
    }
  }

  $obj = new derived();
  $obj->print_var();
?>
