<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("interface.pagers.php");

  class pager_class implements extended_pager
  {
     // :
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
    public function get_page()
    {
      // ...
    }
  }
?>
