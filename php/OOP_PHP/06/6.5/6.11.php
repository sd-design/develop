<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.cls.php");

  if(defined("cls::NAME")) echo "��������� ����������<br>"; // true
  else echo "��������� �� ����������<br>";

  if(defined("cls::POSITION")) echo "��������� ����������<br>"; // false
  else echo "��������� �� ����������<br>";
?>
