<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("5.10.php");

  // Производный интерфейс
  interface third extends first
  {
    public function third();
  }

  // Класс, thd обязательно должен реализовывать
  // методы first() и third()
  class thd implements third
  {
    public function first()
    {
      echo "Метод thd:first()<br>";
    }
    public function third()
    {
      echo "Метод thd:third()<br>";
    }
  }

  $obj = new thd();

  if($obj instanceof first) echo "Объект реализует интерфейс first<br>";
  else echo "Объект не реализует интерфейс first<br>";

  if($obj instanceof third) echo "Объект реализует интерфейс third<br>";
  else echo "Объект не реализует интерфейс third<br>";
?>
