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
    public $val;
  }

  $obj = new cls();
  $obj->val = 100;
  $var = 100;
  change($var, $obj);
  echo $obj->val; // Новое значение функции
  echo $var; // 100

  function change($var, $obj)
  {
    $obj->val = "Новое значение функции";
    $var = "Новое значение функции";
  }
?> 
