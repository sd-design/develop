<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class cls
  {
    public $val;
  }

  $obj = new cls();
  $obj->val = 100;
  $var = 100;
  change($var, $obj);
  echo $obj->val; // ����� �������� �������
  echo $var; // 100

  function change($var, $obj)
  {
    $obj->val = "����� �������� �������";
    $var = "����� �������� �������";
  }
?> 
