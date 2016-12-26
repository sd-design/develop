<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("5.10.php");

  // ����������� ���������
  interface third extends first
  {
    public function third();
  }

  // �����, thd ����������� ������ �������������
  // ������ first() � third()
  class thd implements third
  {
    public function first()
    {
      echo "����� thd:first()<br>";
    }
    public function third()
    {
      echo "����� thd:third()<br>";
    }
  }

  $obj = new thd();

  if($obj instanceof first) echo "������ ��������� ��������� first<br>";
  else echo "������ �� ��������� ��������� first<br>";

  if($obj instanceof third) echo "������ ��������� ��������� third<br>";
  else echo "������ �� ��������� ��������� third<br>";
?>
