<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ���������� ������� � ����������� ������
  require_once("class.base.php");

  // ��������� ������ �������� ������
  $bobj = new base();

  // ����� � ������ �������� ������
  echo "<pre>";
  print_r($bobj);
  print_r(get_class_methods($bobj));
  echo "</pre>";

  // ��������� ������ ������������ ������
  $dobj = new derived();

  // ����� � ������ ������������ ������
  echo "<pre>";
  print_r($dobj);
  print_r(get_class_methods($dobj));
  echo "</pre>";
?>
