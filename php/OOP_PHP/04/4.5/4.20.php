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
    public function print_var()
    {
      echo "����� ������ print_var() �������� ������<br>";
    }
  }
  class derived extends base
  {
    public function print_var()
    {
      echo "����� ������ print_var() ������������ ������<br>";
    }
  }

  $obj = new derived();
  $obj->print_var();
?>
