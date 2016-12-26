<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Устанавливаем соединение с базой данных
  require_once("config.php");
  // Подключаем класс постраничной навигации
  require_once("class.pager_mysql.php");

  // Объявляем объект постраничной навигации
  $obj = new pager_mysql("position",
                         "",
                         "ORDER BY name");

  // Выводим содержимое текущей страницы
  $arr = $obj->get_page();
  for($i = 0; $i < count($arr); $i++)
  {
    echo "<a href=position.php?id={$arr[$i][id_postion]}>".
         "{$arr[$i][name]}</a><br>";
  }

  // Выводим ссылки на другие страницы
  echo $obj;
?>
