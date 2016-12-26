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
    if(rand(0,1)) throw new ExceptionSQLError();
    else throw new ExceptionSQLNoneRecords();
  }
  catch(ExceptionSQL $exp)
  {
    echo "ExceptionSQL-исключение ".get_class($exp)."<br>";
    // Передача исключения далее по каскаду
    throw $exp;
  }
  catch(ExceptionSQLError $exp)
  {
    echo "ExceptionSQLError-исключение";
  }
  catch(ExceptionSQLNoneRecords $exp)
  {
    echo "ExceptionNoneRecords-исключение";
  }
?>
