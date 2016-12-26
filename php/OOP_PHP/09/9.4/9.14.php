<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.example.php");

  // �������� ��������� ������
  $obj = new ReflectionClass("example");

  // ������� ������ ����������� ������ ������
  echo "<pre>";
  print_r($obj->getStaticProperties());
  echo "</pre>";

  // ������������� ����� �������� ������������
  // ����� ������ count
  $obj->setStaticPropertyValue("count", 100);

  // ������� �������� ������������ ����� ������
  // count
  echo $obj->getStaticPropertyValue("count");

?>
