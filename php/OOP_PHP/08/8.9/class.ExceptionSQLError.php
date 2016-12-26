<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.ExceptionSQL.php");

  class ExceptionSQLError extends ExceptionSQL
  {
    public function __construct()
    {
      parent::__construct("Ошибка в SQL-запросе: ".mysql_error(), 1001);
    }
  }
?>
