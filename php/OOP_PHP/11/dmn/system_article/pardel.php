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

  // ������ �� SQL-��������
  $_GET['id_catalog']   = intval($_GET['id_catalog']);
  $_GET['id_position']  = intval($_GET['id_position']);
  $_GET['id_paragraph'] = intval($_GET['id_paragraph']);

  try
  {
    // ��������� ��� �����������, ������������� ��������� � ������� ��
    $query = "SELECT * FROM $tbl_paragraph_image
              WHERE id_position=$_GET[id_position] AND
                    id_catalog=$_GET[id_catalog] AND
                    id_paragraph=$_GET[id_paragraph]";
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
              WHERE id_position=$_GET[id_position] AND
                    id_catalog=$_GET[id_catalog] AND
                    id_paragraph=$_GET[id_paragraph]";
    if(!mysql_query($query))
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� �������� 
                               �������");
    }
    // ��������� � ��������� SQL-������ �� �������� �����������
    $query = "DELETE FROM $tbl_paragraph
              WHERE id_position=$_GET[id_position] AND
                    id_catalog=$_GET[id_catalog] AND
                    id_paragraph=$_GET[id_paragraph]
              LIMIT 1";
    if(!mysql_query($query))
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� �������� 
                               �������");
    }
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