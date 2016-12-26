<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  $arr = array(1, 2, 3, array(4, 5), array(6, 7));
  $str = var_export($arr, true);
  // Из-за ошибки реализации приходится 
  // удалять последнюю запятую самостоятельно
  $str = preg_replace("|,[\s]*\)|is", ")", $str);
  // Создаем массив $copy
  eval('$copy = '.$str.';');

  echo "<pre>";
  print_r($copy);
  echo "</pre>";
?>
