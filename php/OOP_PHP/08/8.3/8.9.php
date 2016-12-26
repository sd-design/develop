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
    $url = "error.php?id={$exp->getCode()}";
    echo "<HTML><HEAD>
           <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$url'>
          </HEAD></HTML>";    
  }
?>
