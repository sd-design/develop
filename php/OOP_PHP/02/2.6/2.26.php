<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.recurse.php");

  $obj = new recurse();

  $arr = array("1" => array("11", "12", "13"), 
               "2" => array("21", "22", "23"),
               "3" => array("31", "32", "33")); 
  $obj->list_struct($arr);
?>
