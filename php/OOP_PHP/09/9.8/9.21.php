<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.example.php");

  try
  {
    // ������� ������ ������ example
    $exp = new example(1, 2, 3);

    // �������� ��������� ������
    $obj = new ReflectionClass("example");

    // �������� ��������� ����� $first
    $fst = $obj->getProperty("first");
    // �������� �������� ����� �������� ��������� �����
    $fst->setValue($exp, 100);
    // ������� ����� ��������
    echo $exp->getFirst();
  }
  catch(ReflectionException $exc)
  {
    echo "����������: {$exc->getMessage()}<br>";
    echo "� ����� {$exc->getFile()}<br>";
    echo "� ������ {$exc->getLine()}<br>";
  }
?>
