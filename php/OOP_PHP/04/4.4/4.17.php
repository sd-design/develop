<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class base
  {
    private $var;
    public function __construct($var)
    {
      $this->var = $var;
    }
    public function print_var()
    {
      echo $this->var;
    }
  }
  class derived extends base
  {
    public function __construct($var)
    {
      $this->var = $var;
    }
  }

  $obj = new derived(20);
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
  echo $obj->print_var();
?>
