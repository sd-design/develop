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
  require_once("class.employee.php");

  // ��������� ������ ������ employee
  $emp = new employee();
  $emp->surname    = "�������";
  $emp->name       = "�����";
  $emp->patronymic = "��������";

  // �������� ���� �������, ��������� ��� � ��������
  list($surname) = $emp->get_array();

  // ������� ��������
  echo $surname;
?>
