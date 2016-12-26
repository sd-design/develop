<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class subclass
  {
    public $var;
    public function __construct()
    {
      $this->var = 100;
    }
  }
  class cls
  {
    public $subobj;
    public $var;
    public function __construct()
    {
      $this->subobj = new subclass();
      $this->var = 100;
    }
  }

  $obj = new cls();

  $new_obj = clone $obj;

  $new_obj->var = 200;
  $new_obj->subobj->var = 200;

  // ���������������� ���� ������ cls
  // �����������
  echo $obj->var; // 100
  echo "<br>";
  // ����� ���������� ������ subclass
  // �� �����������
  echo $obj->subobj->var; // 200
  echo "<br>";
?>
