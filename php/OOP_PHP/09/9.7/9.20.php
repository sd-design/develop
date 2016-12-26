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

  // ������� ������ ������ example
  $exp = new example(1, 2, 3);

  // �������� ��������� ������
  $obj = new ReflectionClass("example");

  // �������� ��������� ����� $second
  $snd = $obj->getProperty("second");
  // ������������� ��������
  $snd->setValue($exp, 100);
  // ������� ����� ��������
  echo $exp->second; // 100
?>
