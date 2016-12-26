<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем реализацию класса employee
  require_once("class.employee.php");

  try
  {
    // Объявляем объект класса employee
    $obj = new employee("Корнеев", "Иван", "Григорьевич");
    // Производим попытку изменения несуществующего
    // члена класса $var, что вызывает генерацию
    // ислючения
    $obj->var = 100;
    // Остальные операторы
  }
  catch(Exception $exp)
  {
    // Блок обработки исключительной ситуации
    echo "Исключение: {$exp->getMessage()}<br>";
    echo "в файле {$exp->getFile()}<br>";
    echo "в строке {$exp->getLine()}<br>";
    echo "<pre>";
    echo $exp->getTraceAsString();
    echo "</pre>";
  }
?>
