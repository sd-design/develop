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

  // ��������� �������� �� ����� � ���������
  $_GET['id_catalog'] = intval($_GET['id_catalog']);
  $_GET['id_parent']  = intval($_GET['id_parent']);

  try
  {
    // ��������� ������� �������� ��������
    $query = "SELECT pos FROM $tbl_catalog
              WHERE id_catalog = $_GET[id_catalog]
              LIMIT 1";
    $cat = mysql_query($query);
    if(!$cat)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ���������� 
                               ������� ��������");
    }
    if(mysql_num_rows($cat))
    {
      $pos_current = mysql_result($cat, 0);
    }
    // ��������� ������� ����������� ��������
    $query = "SELECT pos FROM $tbl_catalog
              WHERE id_parent = $_GET[id_parent] AND 
                    pos < $pos_current
              ORDER BY pos DESC
              LIMIT 1";
    $cat = mysql_query($query);
    if(!$cat)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ���������� 
                               ������� ��������");
    }
    if(mysql_num_rows($cat))
    {
      $pos_preview = mysql_result($cat, 0);
  
      // ������ ������� ������� � ���������� ��������
      $query = "UPDATE $tbl_catalog 
                SET pos = $pos_current + $pos_preview - pos
                WHERE id_parent = $_GET[id_parent] AND 
                      pos IN ($pos_current, $pos_preview)";
      if(!mysql_query($query))
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                "������ ���������
                                 ������� �������");
      }
    }
    // ���� ������ �������� ������, ������������ �������������� �������
    // �� ������� �������� �����������������
    header("Location: index.php?".
           "id_parent=$_GET[id_parent]&page=$_GET[page]");
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>