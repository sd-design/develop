<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  try
  {
    // Подключаем реализацию функции print_user()
    require_once("function.print_user.php");
    // Вызываем функцию 
    print_user();
  }
  catch(Exception $exp)
  {
    // Блок обработки исключительной ситуации
    echo "Исключение {$exp->getCode()} : {$exp->getMessage()}<br>";
    echo "в файле {$exp->getFile()}<br>";
    echo "в строке {$exp->getLine()}<br>";
  }
?>
