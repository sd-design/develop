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

  $obj = new employee("�������", "�����", "��������");
  if(isset($obj->surname)) $obj->surname = "�������"; // true
  else echo "����������� ���� ������<br>";
  if(isset($obj->surname1)) $obj->surname1 = "�������"; // false
  else echo "����������� ���� ������<br>";
  echo "{$obj->surname} {$obj->name} {$obj->patronymic}";
?>
