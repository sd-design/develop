<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("function.hello.php");

  // �������� ��������� �������
  $obj = new ReflectionFunction("hello");
  // ������� ����������� � �������
  echo "<pre>";
  echo $obj->getDocComment();
  echo "</pre>";
  // � ����� �������� ����� � ������ �����,
  // � ������� ������� ���������� � �������������
  echo "����: {$obj->getFileName()}<br>";
  echo "������ � {$obj->getStartLine()} 
        �� {$obj->getEndLine()}<br>";
?>
