<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.employee.php");

  $emp = new employee();
  $emp->init_object("�������", "�����", "��������");

  echo "<pre>";
  print_r($emp);
  echo "</pre>";

  $obj = new employee();
  $obj->init_object("������");

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
