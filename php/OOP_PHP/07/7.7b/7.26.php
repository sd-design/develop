<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем реализацию класса
  require_once("class.user.php");

  // Серилизованный объект
  $object = 'O:4:"user":4:{s:4:"name";s:4:"nick";'.
            's:8:"password";s:8:"password";'.
            's:8:"referrer";s:17:"/oop/07/index.php";'.
            's:4:"time";i:1177676349;}';

  // Восстанавливаем объект
  $obj = unserialize($object);

  // Выводим дамп объекта
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
