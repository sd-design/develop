<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("interface.pager.php");

  class base
  {
    public function base_method()
    {
      echo "����� �������� ������<br>";
    }
  }
  class derived extends base implements pager
  {
    public function get_total()
    {
        // ...
    }
    public function get_pnumber()
    {
        // ...
    }
    public function get_page_link()
    {
        // ...
    }
    public function get_parameters()
    {
        // ...
    }
  }
?>
