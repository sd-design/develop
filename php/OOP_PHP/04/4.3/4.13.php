<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.person.php");

  class client extends person
  {
    public function __construct($surname, $name, $patronymic){}
  }
  class employee extends person
  {
    public function __construct($surname, $name, $patronymic){}
  }

  $obj = new employee("�������", "�����", "��������");
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
