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

  class ExceptionSQLNoneRecords extends ExceptionSQL
  {
    public function __construct(
                          $message = "Запрашиваемые записи отсутствуют")
    {
      parent::__construct($message, 1001);
    }
  }
?>
