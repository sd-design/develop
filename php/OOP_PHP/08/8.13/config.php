<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ����� ������� MySQL
  $dblocation = "localhost";
  // ��� ���� ������ �� �������� ��� ��������� ������
  $dbname = "oop";
  // ��� ������������ ���� ������
  $dbuser = "root";
  // � ��� ������
  $dbpasswd = "";

  // ���������� ��������� ��� ����� ����������
  define("NOT_CONNECTION", 0);
  define("NOT_DATABASE", 1);

  // ������������� ���������� � ����� ������
  $dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);
  if (!$dbcnx)
  {
    throw new Exception("���������� ���������� 
                         ���������� � �������� MySQL ",
                         NOT_CONNECTION);
  }
  // �������� ���� ������
  if (! @mysql_select_db($dbname, $dbcnx) )
  {
    throw new Exception("������ ������ ���� ������", NOT_DATABASE);
  }

  // ������������� ��������� ����������; ������� ������� �� ���������,
  // � ������� ������ ����� ������������ ������� MySQL 
  @mysql_query("SET NAMES 'cp1251'");
?>
