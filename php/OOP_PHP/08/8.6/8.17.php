<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.base.php");

  try
  {
    $obj = new base();
    $obj->generate();
  }
  catch(Exception $exp)
  {
    echo "<pre>";
    echo $exp->getTraceAsString();
    echo "</pre>";
  }
?>
