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
    public $name;
    public $arr;
  }

  $obj = new cls();
  $obj->name = "name";
  $obj->arr = array("first", "second", "third", "fourth");

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
