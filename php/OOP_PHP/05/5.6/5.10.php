<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("interface.first.php");
  require_once("interface.second.php");

  class fst implements first
  {
    public function first()
    {
      echo "Метод fst:first()<br>";
    }
  }
  class snd implements second
  {
    public function second()
    {
      echo "Метод snd:second()<br>";
    }
  }
  class cmn implements first, second
  {
    public function first()
    {
      echo "Метод cmn:first()<br>";
    }
    public function second()
    {
      echo "Метод cmn:second()<br>";
    }
  }
?>
