<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.recurse.php");
  require_once("class.employee.php");

  $emp = new employee();
  $emp->surname    = "�������";
  $emp->name       = "�����";
  $emp->patronymic = "��������";
  $emp->set_age(23);

  $obj = new recurse();

  $obj->list_struct($emp);
?>
