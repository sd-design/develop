<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ���������� ���������� ������
  require_once("class.cls.php");

  // ���������� ������
  session_start();

  // ��������������� ������
  $obj = unserialize($_SESSION['obj']);

  // ������� ���� �������
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
