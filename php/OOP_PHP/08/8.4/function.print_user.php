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
  require_once("config.php");

  // ���������� ��������� ��� ����� ����������
  define("SQL_ERROR", 100);
  define("NONE_RECORDS", 101);

  function print_user()
  {
    $query = "SELECT * FROM object_user";
    $usr = mysql_query($query);
    // ���������� ���������� � ������
    // ������ ���������� SQL-�������
    if(!$usr) throw new Exception(mysql_error(), SQL_ERROR);
    // ���������� ����������, ���� � 
    // ������� ��� �� ����� ������
    if(!mysql_num_rows($usr))
    {
      throw new Exception("����������� ������ � �������", NONE_RECORDS);
    }

    // ������� ������ �������������
    while($user = mysql_fetch_array($usr))
    {
      echo $user['name']."<br>";
    }
  }
?>
