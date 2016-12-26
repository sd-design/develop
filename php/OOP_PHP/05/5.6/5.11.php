<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем классы 
  require_once("5.10.php");
 
 // Формируем массив из случайных объектов
  for($i = 0; $i < 10; $i++)
  {
    switch(rand(1,3))
    {
      case 1:
        $arr[] = new fst();
        break;
      case 2:
        $arr[] = new snd();
        break;
      case 3:
        $arr[] = new cmn();
        break;
    }
  }
  // Определяем принадлежность элементов 
  // массива к классам
  foreach($arr as $obj)
  {
    if($obj instanceof second) echo "Объект класса ".get_class($obj)." 
                                     реализует интерфейс second<br>";
    else echo "Объект класса ".get_class($obj)." не реализует интерфейс 
               second<br>";
  }
?>
