<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ��������� ��� ���������� �� �����������
  $str = "Hello world!";
  $var = "test";
  // ������� ���������� $test � ���������� "Hello world"
  $$var = $str;
  echo $test;
  // �������� ��� ���������� �� ��������
  $var = 5;
  echo "<br>$var";
?>
