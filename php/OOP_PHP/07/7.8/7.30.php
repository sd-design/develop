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

  // ������� ������
  $obj = new user("nick", "password");

  // ���������� ������
  $id_user = user::serialize(serialize($obj));

  // ��������������� ������
  $red = user::unserialize($id_user);

  // ������� ���� ���������������� �������
  echo "<pre>";
  print_r($red);
  echo "</pre>";
?>
