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

  // ��������� �� ������� object 
  // ������ � ��������������� 1
  $query = "SELECT * FROM object WHERE id_object = 1";
  $obj = mysql_query($query);
  if(!$obj) exit("������ ���������� ������� �� �������");
  // ���� ������ ������� - ������������ ��
  if(mysql_num_rows($obj))
  {
    $table = mysql_fetch_array($obj);
    // ��������������� ������
    $object = unserialize($table['object']);
    // ������� ���� �������
    echo "<pre>";
    print_r($object);
    echo "</pre>";
  }
?>
