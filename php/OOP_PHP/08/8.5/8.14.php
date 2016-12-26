<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ���������� ���������� ������ employee
  require_once("class.employee.php");

  try
  {
    // ��������� ������ ������ employee
    $obj = new employee("�������", "����", "�����������");
    // ���������� ������� ��������� ���������������
    // ����� ������ $var, ��� �������� ���������
    // ���������
    $obj->var = 100;
    // ��������� ���������
  }
  catch(Exception $exp)
  {
    // ���� ��������� �������������� ��������
    echo "����������: {$exp->getMessage()}<br>";
    echo "� ����� {$exp->getFile()}<br>";
    echo "� ������ {$exp->getLine()}<br>";
    echo "<pre>";
    echo $exp->getTraceAsString();
    echo "</pre>";
  }
?>
