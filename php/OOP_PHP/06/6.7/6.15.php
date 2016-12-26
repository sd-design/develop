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
    public function get_name()
    {
      return __CLASS__."<br>";
    }
  }
  class derived extends base {}
  class third
  {
    public function get_name()
    {
      return __CLASS__."<br>";
    }
  }

  $obj = new base();
  echo $obj->get_name(); // base

  $obj = new derived();
  echo $obj->get_name(); // base

  $obj = new third();
  echo $obj->get_name(); // derived
?>
