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
  require_once("class.user.php");

  // �������������� ������
  $object = 'O:4:"user":4:{s:4:"name";s:4:"nick";'.
            's:8:"password";s:8:"password";'.
            's:8:"referrer";s:17:"/oop/07/index.php";'.
            's:4:"time";i:1177676349;}';

  // ��������������� ������
  $obj = unserialize($object);

  // ������� ���� �������
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
