<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  function __autoload($classname)
  {
    @include_once("class/class.$classname.php");
  }

  if(class_exists("employee"))
    echo "����� employee ����������<br>";
  else
    echo "����� employee �� ����������<br>";

  if(class_exists("client"))
    echo "����� client ����������<br>";
  else
    echo "����� client �� ����������<br>";

  if(class_exists("contract"))
    echo "����� contract ����������<br>";
  else
    echo "����� contract �� ����������<br>";

  if(class_exists("none"))
    echo "����� none ����������<br>";
  else
    echo "����� none �� ����������<br>";
?>
