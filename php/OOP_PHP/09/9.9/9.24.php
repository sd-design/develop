<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // �������� ��������� ���������� 
  // ��� ������ � MySQL
  $obj = new ReflectionExtension("mysql");
  // ������� ��������� �����������������
  // ����� php.ini
  echo "<pre>";
  print_r($obj->getINIEntries());
  echo "</pre>";
  // ������� ������ ������� ����������
  $functions = $obj->getFunctions();
  foreach($functions as $funct)
  {
    echo $funct->getName()."<br>";
  }
?>
