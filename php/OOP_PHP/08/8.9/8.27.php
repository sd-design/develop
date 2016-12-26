<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.ExceptionSQLError.php");
  require_once("class.ExceptionSQLNoneRecords.php");

  try
  {
    $query = "SELECT * FROM exception";
    $ext = mysql_query($query);
    // Если произошла ошибка - генерируем исключение
    // ExceptionSQLError()
    if(!$ext) throw new ExceptionSQLError();
    // Если в таблице exception отсутствуют
    // записи - генерируем исключение
    if(!mysql_num_rows($ext)) throw new ExceptionSQLNoneRecords();
    while($exception = mysql_fetch_array($ext))
    {
      echo $exception['message']."<br>";
    }
  }
  catch(ExceptionSQLError $exp)
  {
    // Ошибка в SQL-запросе
    echo "Произошла ошибка при выполнении SQL-запроса<br>";
    echo "{$exp->getMessage()}<br>";
  }
  catch(ExceptionSQLNoneRecords $exp)
  {
    // Отсутствуют записи
    echo "Таблица exception не содержит записей<br>";
  }
?>
