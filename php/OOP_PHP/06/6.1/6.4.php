<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.counter.php");

  $obj = new counter();
  echo counter::$count."<br>"; // 1

  for($i = 0; $i < 3; $i++)
  {
    $arr[] = new counter();
    echo counter::$count."<br>"; // 2, 3, 4
  }

  // ���������� ������ ��������
  unset($arr);

  echo counter::$count."<br>"; // 1
?>
