<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class point
  {
    public $x;
    public $y;
  }

  $obj = new point();
  $obj->x = 100;
  $obj->y = 100;

  $fst = $obj;

  unset($obj);

  echo "<pre>";
  print_r($fst); // ������ ����������
  echo "</pre>";

  echo "<pre>";
  print_r($obj); // ������ �� ����������
  echo "</pre>";
?>
