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
  $_GET['id_catalog']   = intval($_GET['id_catalog']);
  $_GET['id_position']  = intval($_GET['id_position']);
  $_GET['id_paragraph'] = intval($_GET['id_paragraph']);
  $_GET['id_image']     = intval($_GET['id_image']);

  try
  {
    // Формируем и выполняем SQL-запрос на отображение позиции
    $query = "UPDATE $tbl_paragraph_image SET hide='show' 
              WHERE id_position=$_GET[id_position] AND
                    id_catalog=$_GET[id_catalog] AND
                    id_paragraph=$_GET[id_paragraph] AND
                    id_image=$_GET[id_image]";
    if(mysql_query($query))
    {
      header("Location: image.php?".
             "id_paragraph=$_GET[id_paragraph]&".
             "id_position=$_GET[id_position]&".
             "id_catalog=$_GET[id_catalog]&".
             "page=$_GET[page]");
    }
    else
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "Ошибка при отображении позиции");
    }
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>