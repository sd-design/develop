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

  // Проверяем параметр id_news, предотвращая SQL-инъекцию
  $_GET['id_news'] = intval($_GET['id_news']);

  // Отображаем новость
  try
  {
    $query = "UPDATE $tbl_news SET hide='show' 
              WHERE id_news=$_GET[id_news]";
    if(mysql_query($query))
    {
      header("Location: index.php?page=$_GET[page]");
    }
    else
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "Ошибка при обращении 
                               к блоку новостей");
    }
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>