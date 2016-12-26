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
  require_once("class.cls.php");
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Создаем объект
  $obj = new cls(100);

  // Серилизуем объект
  $object = serialize($obj);
  // Экранируем специальные символы
  $object = mysql_real_escape_string($object);

  // Сохраняем объект в таблице базы данных
  $query = "INSERT INTO object VALUES (NULL, '$object')";
  if(!mysql_query($query)) exit("Ошибка сохранения 
                                 объекта в базе данных");
  else echo "Объект успешно сохранен в базе данных";
?>
