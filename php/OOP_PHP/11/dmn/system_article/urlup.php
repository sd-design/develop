<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);

  // ������������� ���������� � ����� ������
  require_once("../../config/config.php");
  // ���������� ���� �����������
  require_once("../utils/security_mod.php");
  // ���������� SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");

  // ������ �� SQL-��������
  $_GET['id_position'] = intval($_GET['id_position']);
  $_GET['id_catalog']  = intval($_GET['id_catalog']);

  try
  {
    // ��������� ������� �������� ��������
    $query = "SELECT pos FROM $tbl_position
              WHERE id_position = $_GET[id_position] AND
                    id_catalog = $_GET[id_catalog]
              LIMIT 1";
    $pos = mysql_query($query);
    if(!$pos)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ���������� 
                               �������");
    }
    if(mysql_num_rows($pos))
    {
      $pos_current = mysql_result($pos, 0);
    }
    // ��������� ������� ����������� ��������
    $query = "SELECT pos FROM $tbl_position
              WHERE pos < $pos_current AND
                    id_catalog = $_GET[id_catalog]
              ORDER BY pos DESC
              LIMIT 1";
    $pos = mysql_query($query);
    if(!$pos)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ���������� 
                               �������");
    }
    if(mysql_num_rows($pos))
    {
      $pos_preview = mysql_result($pos, 0);
  
      // ������ ������� ������� � ���������� �������
      $query = "UPDATE $tbl_position 
                SET pos = $pos_current + $pos_preview - pos
                WHERE id_catalog = $_GET[id_catalog] AND 
                      pos IN ($pos_current, $pos_preview)";
      if(!mysql_query($query))
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                "������ ���������
                                 �������");
      }
    }
    // ���� ������ �������� ������, ������������ �������������� �������
    // �� ������� �������� �����������������
    header("Location: index.php?".
           "id_parent=$_GET[id_catalog]&page=$_GET[page]");
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>