<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class point
  {
    public $x;
    public $y;
  }

  $fst = new point();
  $fst->x = 100;
  $fst->y = 100;

  $snd = new point();
  $snd->x = 100;
  $snd->y = 100;

  if($fst == $snd) echo "Объекты равны<br>";
  else echo "Объекты не равны<br>";

  $arr = (array)$snd;
  $obj = (object)$arr;

  if($fst == $obj) echo "Объекты равны<br>";
  else echo "Объекты не равны<br>";

  $snd->y = 10;

  if($fst == $snd) echo "Объекты равны<br>";
  else echo "Объекты не равны<br>";
?> 
