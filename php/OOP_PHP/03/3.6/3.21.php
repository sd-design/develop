<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class/class.employee.php");
  require_once("class/class.client.php");
  require_once("class/class.contract.php");

  $emp = new client("�������", "�����", "��������");
  $cnt = new employee("�������", "����", "�����������");
  $obj = new contract(time(), 
                      time() + 30*24*60*60, 
                      "��������", 
                      "10000", 
                      "�������", 
                      "�����", 
                      "��������",
                      "�������",
                      "����",
                      "�����������");
?>
