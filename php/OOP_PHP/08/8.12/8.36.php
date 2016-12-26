<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  function catch_exception()
  {
    try
    {
      require_once("generate.php");
    }
    catch(ExceptionSQLError $exp)
    {
      echo "ExceptionSQLError-исключение";
    }
    catch(ExceptionSQLNoneRecords $exp)
    {
      echo "ExceptionSQLNoneRecords-исключение";
    }
  }
?>
