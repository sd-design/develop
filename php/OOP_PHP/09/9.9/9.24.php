<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Получаем отражение расширения 
  // для работы с MySQL
  $obj = new ReflectionExtension("mysql");
  // Выводим директивы конфигурационного
  // файла php.ini
  echo "<pre>";
  print_r($obj->getINIEntries());
  echo "</pre>";
  // Выводим список функций расширения
  $functions = $obj->getFunctions();
  foreach($functions as $funct)
  {
    echo $funct->getName()."<br>";
  }
?>
