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
  require_once("../../config/config.php");
  // Подлкючаем блок авторизации
  require_once("../utils/security_mod.php");
  // Подключаем SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");

  // Защита от SQL-инъекции
  $_GET['id_catalog'] = intval($_GET['id_catalog']);

  try
  {
    // Формируем и выполняем SQL-запрос на сокрытие каталога
    $query = "UPDATE $tbl_catalog SET hide='hide' 
              WHERE id_catalog=".$_GET['id_catalog'];
    if(mysql_query($query))
    {
      header("Location: index.php?index.php?".
             "id_parent=$_GET[id_parent]&page=$_GET[page]");
    } 
    else
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "Ошибка при сокрытии 
                               каталога");
    }
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>