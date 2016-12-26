<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем определение класса cls
  require_once("class.cls.php");

  // Создаем объект
  $obj = new cls(100);

  // Серилизуем объект
  $text = serialize($obj);

  // Сохраняем объект в файл
  $fd = fopen("text.obj", "w");
  if(!$fd) exit("Невозможно открыть файл");
  fwrite($fd, $text);
  fclose($fd);
?>
