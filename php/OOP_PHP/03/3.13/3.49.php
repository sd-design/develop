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

  $obj = new cls();
  if(method_exists("cls", "public_print"))
    echo "����� cls::public_print() ����������<br>";
  else
    echo "����� cls::public_print() �� ����������<br>";

  if(method_exists("cls", "private_print"))
    echo "����� cls::private_print() ����������<br>";
  else
    echo "����� cls::private_print() �� ����������<br>";

  if(method_exists("cls", "print"))
    echo "����� cls::print() ����������<br>";
  else
    echo "����� cls::print() �� ����������<br>";
?>
