<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class ExceptionSpecitial extends Exception
  {
    public function __toString()
    {
      return "���������� ExceptionSpecitial ��������� �� ������������";
    }
  }

  throw new ExceptionSpecitial();
?>
