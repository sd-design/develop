<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("function.hello.php");

  // Получаем отражение функции
  $obj = new ReflectionFunction("hello");
  // Выводим комментарий к функции
  echo "<pre>";
  echo $obj->getDocComment();
  echo "</pre>";
  // А также название файла и номера строк,
  // с которых функция начинается и заканчивается
  echo "Файл: {$obj->getFileName()}<br>";
  echo "Строки с {$obj->getStartLine()} 
        по {$obj->getEndLine()}<br>";
?>
