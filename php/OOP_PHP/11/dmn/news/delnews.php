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

  // ��������� �������� id_news, ������������ SQL-��������
  $_GET['id_news'] = intval($_GET['id_news']);

  try
  {
    // ���� ��������� ������� �������� 
    // ����������� - ������� ���
    $query = "SELECT * FROM $tbl_news 
              WHERE id_news=$_GET[id_news]";
    $new = mysql_query($query);
    if(!$new)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��������
                               ���������� �����");
    }
    if(mysql_num_rows($new) > 0)
    {
      $news = mysql_fetch_array($new);
      if(file_exists("../../".$news['urlpict']))
      {
        @unlink("../../".$news['urlpict']);
      }
    }
    // ��������� � ��������� SQL-������ 
    // �� �������� ���������� ����� �� ���� ������
    $query = "DELETE FROM $tbl_news 
              WHERE id_news=$_GET[id_news] 
              LIMIT 1";
    if(mysql_query($query))
    {
      header("Location: index.php?page=$_GET[page]");
    }
    else
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��������
                               ���������� �����");
    }
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>