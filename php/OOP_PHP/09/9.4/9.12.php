<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.example.php");

  // Получаем отражение класса
  $obj = new ReflectionClass("example");

  // Выводим комментарий к классу
  echo "<pre>";
  echo $obj->getDocComment();
  echo "</pre>";
  // А также название файла и номера строк,
  // с которых начинается и заканчивается описание класса
  echo "Файл: {$obj->getFileName()}<br>";
  echo "Строки с {$obj->getStartLine()} 
        по {$obj->getEndLine()}<br>";
?>
