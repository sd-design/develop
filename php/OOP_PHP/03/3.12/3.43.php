<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class minmax
  {
    private function __call($method, $arg)
    {
      if(!is_array($arg)) return false;
      $value = $arg[0];
      if($method == "min")
      {
        for($i = 0; $i < count($arg); $i++)
        {
          if($arg[$i] < $value) $value = $arg[$i];
        }
      }
      if($method == "max")
      {
        for($i = 0; $i < count($arg); $i++)
        {
          if($arg[$i] > $value) $value = $arg[$i];
        }
      }
      return $value;
    }
  }
?>
