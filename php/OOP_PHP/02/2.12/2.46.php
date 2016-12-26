<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем объявление класса
  require_once("class.employee.php");

  // Объявляем объект класса employee
  $emp = new employee();
  $emp->surname    = "Борисов";
  $emp->name       = "Игорь";
  $emp->patronymic = "Иванович";
  $emp->set_age(23); // Устанавливаем закрытый член age

  // Преобразуем объект в массив
  $arr = (array)$emp;

  // Преобразуем массив в объект
  $obj = (object)$arr;

  echo "{$obj->surname} {$obj->name} {$obj->patronymic}";

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
