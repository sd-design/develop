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
    // ��������� � ��������� SQL-������ �� �������� ������� ��������
    $query = "UPDATE $tbl_position SET hide='hide' 
              WHERE id_position=".$_GET['id_position']." AND
                    id_catalog=".$_GET['id_catalog'];
    if(mysql_query($query))
    {
      header("Location: index.php?".
             "id_parent=$_GET[id_catalog]&page=$_GET[page]");
    }
    else
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� �������� �������");
    }
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>