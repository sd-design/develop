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
    public $var;
    public function __construct()
    {
      $this->var = 100;
    }
    public function __clone()
    {
      $this->var = "����";
    }
  }

  $obj = new cls();
  $new_obj = clone $obj;
  echo $new_obj->var; // ����
  echo $obj->var; // 100
?>
