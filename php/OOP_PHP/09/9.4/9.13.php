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

  // ������� �������� ������� ������ example
  $o = $obj->newInstance(1, 2, 3);
  
  // ����� ������ ������� ������ example
  echo $o->getFirst();
?>
