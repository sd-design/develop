<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ���������� ���������� ������
  require_once("class.cls.php");
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ������� ������
  $obj = new cls(100);

  // ���������� ������
  $object = serialize($obj);
  // ���������� ����������� �������
  $object = mysql_real_escape_string($object);

  // ��������� ������ � ������� ���� ������
  $query = "INSERT INTO object VALUES (NULL, '$object')";
  if(!mysql_query($query)) exit("������ ���������� 
                                 ������� � ���� ������");
  else echo "������ ������� �������� � ���� ������";
?>
