<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.minmax.php");

  $obj = new minmax();
  echo $obj->min(43, 18, 5, 61, 23, 10, 56, 36); // 5
  echo "<br>";
  echo $obj->max(43, 18, 5, 61, 23); // 61
?>
