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

  try
  {
    // Извлекаем позицию текущего элемента
    $query = "SELECT pos FROM $tbl_paragraph
              WHERE id_paragraph = $_GET[id_paragraph] AND
                    id_position = $_GET[id_position] AND
                    id_catalog = $_GET[id_catalog]
              LIMIT 1";
    $par = mysql_query($query);
    if(!$par)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "Ошибка при извлечении 
                               позиции");
    }
    if(mysql_num_rows($par)) $pos_current = mysql_result($par, 0);
    // Извлекаем позицию предыдущего элемента
    $query = "SELECT pos FROM $tbl_paragraph
              WHERE pos < $pos_current AND
                    id_position = $_GET[id_position] AND
                    id_catalog = $_GET[id_catalog]
              ORDER BY pos DESC
              LIMIT 1";
    $par = mysql_query($query);
    if(!$par)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "Ошибка при извлечении 
                               позиции");
    }
    if(mysql_num_rows($par))
    {
      $pos_preview = mysql_result($par, 0);
  
      // Меняем местами текущую и предыдущую позиции
      $query = "UPDATE $tbl_paragraph
                SET pos = $pos_current + $pos_preview - pos
                WHERE id_position = $_GET[id_position] AND
                      id_catalog = $_GET[id_catalog] AND 
                      pos IN ($pos_current, $pos_preview)";
      if(!mysql_query($query))
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                "Ошибка изменения
                                 позиции");
      }
    }
    // Если запрос выполнен удачно, осуществляем автоматический переход
    // на главную страницу администрирования
    header("Location: paragraph.php?".
           "id_position=$_GET[id_position]&".
           "id_catalog=$_GET[id_catalog]&".
           "page=$_GET[page]");
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>