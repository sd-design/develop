<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ���������� ����������� ������ cls
  require_once("class.cls.php");

  // ��������� �������������� ������ �� �����
  $fd = fopen("text.obj", "r");
  if(!$fd) exit("���������� ������� ����");
  $text = fread($fd, filesize("text.obj"));
  fclose($fd);

  // ��������������� ������
  $obj = unserialize($text);

  // ������� ���� �������
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
