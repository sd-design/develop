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
  require_once("class.point.php");

  // ������ �������� point
  $arr = array(point::get_point(1, 1),
               point::get_point(2, 2),
               point::get_point(3, 0),
               point::get_point(4, 5));

  // ������� ���� �������
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
?>
