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
    private $var;
    public function __construct()
    {
      echo "����� ������������<br>";
      $this->var = 100;
    }
  }

  $obj = new cls();

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
