<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.pager_file.php");

  // ��������� ������ ������������ ���������
  $obj = new pager_file("linux.words");

  // ������� ���������� ������� ��������
  $arr = $obj->get_page();
  for($i = 0; $i < count($arr); $i++)
  {
    echo "{$arr[$i]}<br>";
  }

  // ������� ������ �� ������ ��������
  echo $obj;
?>
