<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class ExceptionSpecitial extends Exception
  {
    public function __toString()
    {
      return "Исключение ExceptionSpecitial оказалось не обработанным";
    }
  }

  throw new ExceptionSpecitial();
?>
