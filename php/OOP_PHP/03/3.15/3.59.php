<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  $arr = array(1, 2, 3, array(4, 5), array(6, 7));
  $str = var_export($arr, true);
  // ��-�� ������ ���������� ���������� 
  // ������� ��������� ������� ��������������
  $str = preg_replace("|,[\s]*\)|is", ")", $str);
  // ������� ������ $copy
  eval('$copy = '.$str.';');

  echo "<pre>";
  print_r($copy);
  echo "</pre>";
?>
