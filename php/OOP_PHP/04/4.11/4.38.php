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

  // ������������� ���������� � ����� ������
  $dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);
  if (!$dbcnx) {
   exit( "<P>� ��������� ������ ������ ���� ������ �� ��������,
             ������� ���������� ����������� �������� ����������.</P>" );
  }
  // �������� ���� ������
  if (! @mysql_select_db($dbname, $dbcnx) ) {
    exit( "<P>� ��������� ������ ���� ������ �� ��������,
              ������� ���������� ����������� �������� ����������.</P>" );
  }

  // ������������� ��������� ����������; ������� ������� ���������,
  // � ������� ������ ����� ������������ ������� MySQL
  @mysql_query("SET NAMES 'cp1251'");
?>
