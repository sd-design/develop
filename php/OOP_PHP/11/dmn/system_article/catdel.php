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
  $_GET['id_catalog'] = intval($_GET['id_catalog']);

  try
  {
    // ��������� ��� �����������, ������������� �������� � ������� ��
    $query = "SELECT * FROM $tbl_paragraph_image
              WHERE id_catalog=$_GET[id_catalog]";
    $img = mysql_query($query);
    if(!$img)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ���������� 
                               ���������� �����������");
    }
    if(mysql_num_rows($img))
    {
      while($image = mysql_fetch_array($img))
      {
        if(file_exists("../../".$image['big']))
          @unlink("../../".$image['big']);
        if(file_exists("../../".$image['small']))
          @unlink("../../".$image['small']);
      }
    }
  
    // ��������� � ��������� SQL-������ �� �������� �����������
    $query = "DELETE FROM $tbl_paragraph_image
              WHERE id_catalog=$_GET[id_catalog]";
    if(!mysql_query($query))
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� �������� �������");
    }
    // ��������� � ��������� SQL-������ �� �������� ����������
    $query = "DELETE FROM $tbl_paragraph
              WHERE id_catalog=$_GET[id_catalog]";
    if(!mysql_query($query))
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� �������� �������");
    }
    // ��������� � ��������� SQL-������ �� �������� ������� ��������
    $query = "DELETE FROM $tbl_position
              WHERE id_catalog=$_GET[id_catalog]";
    if(!mysql_query($query))
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� �������� �������");
    }
    // ��������� � ��������� SQL-������ �� �������� ��������
    $query = "DELETE FROM $tbl_catalog
              WHERE id_catalog=$_GET[id_catalog]
              LIMIT 1";
    if(!mysql_query($query))
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� �������� ��������");
    }
  
    header("Location: index.php?id_parent=$_GET[id_parent]&page=$_GET[page]");
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>