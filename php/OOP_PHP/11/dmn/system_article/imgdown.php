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
  $_GET['id_catalog']   = intval($_GET['id_catalog']);
  $_GET['id_position']  = intval($_GET['id_position']);
  $_GET['id_paragraph'] = intval($_GET['id_paragraph']);
  $_GET['id_image']     = intval($_GET['id_image']);

  try
  {
    // ��������� ������� �������� ��������
    $query = "SELECT pos FROM $tbl_paragraph_image
              WHERE id_image = $_GET[id_image] AND
                    id_paragraph = $_GET[id_paragraph] AND
                    id_position = $_GET[id_position] AND
                    id_catalog = $_GET[id_catalog]
              LIMIT 1";
    $img = mysql_query($query);
    if(!$img)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ���������� 
                               �������");
    }
    if(mysql_num_rows($img))
    {
      $pos_current = mysql_result($img, 0);
    }
    // ��������� ������� ���������� ��������
    $query = "SELECT pos FROM $tbl_paragraph_image
              WHERE pos > $pos_current AND
                    id_paragraph = $_GET[id_paragraph] AND
                    id_position = $_GET[id_position] AND
                    id_catalog = $_GET[id_catalog]
              ORDER BY pos
              LIMIT 1";
    $img = mysql_query($query);
    if(!$img)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ���������� 
                               �������");
    }
    if(mysql_num_rows($img))
    {
      $pos_next = mysql_result($img, 0);
  
      // ������ ������� ������� � ���������� �������
      $query = "UPDATE $tbl_paragraph_image
                SET pos = $pos_current + $pos_next - pos
                WHERE id_paragraph = $_GET[id_paragraph] AND
                      id_position = $_GET[id_position] AND
                      id_catalog = $_GET[id_catalog] AND 
                      pos IN ($pos_current, $pos_next)";
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
    header("Location: image.php?".
           "id_paragraph=$_GET[id_paragraph]&".
           "id_position=$_GET[id_position]&".
           "id_catalog=$_GET[id_catalog]&".
           "page=$_GET[page]");
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
?>