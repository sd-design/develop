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

  // ������� ������
  $obj = new cls(100);

  // ���������� ������
  $text = serialize($obj);

  // ��������� ������ � ����
  $fd = fopen("text.obj", "w");
  if(!$fd) exit("���������� ������� ����");
  fwrite($fd, $text);
  fclose($fd);
?>
