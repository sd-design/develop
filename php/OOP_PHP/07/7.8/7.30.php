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

  // Создаем объект
  $obj = new user("nick", "password");

  // Серилизуем объект
  $id_user = user::serialize(serialize($obj));

  // Восстанавливаем объект
  $red = user::unserialize($id_user);

  // Выводим дамп восстановленного объекта
  echo "<pre>";
  print_r($red);
  echo "</pre>";
?>
