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

  // Извлекаем серилизованный объект из файла
  $fd = fopen("text.obj", "r");
  if(!$fd) exit("Невозможно открыть файл");
  $text = fread($fd, filesize("text.obj"));
  fclose($fd);

  // Восстанавливаем объект
  $obj = unserialize($text);

  // Выводим дамп объекта
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
