<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.employee.php");

  if(property_exists("employee", "surname"))
    echo "���� employee::surname ����������<br>";
  else
    echo "���� employee::surname �� ����������<br>";

  if(property_exists("employee", "name"))
    echo "���� employee::name ����������<br>";
  else
    echo "���� employee::name �� ����������<br>";

  if(property_exists("employee", "patronymic"))
    echo "���� employee::patronymic ����������<br>";
  else
    echo "���� employee::patronymic �� ����������<br>";

  if(property_exists("employee", "age"))
    echo "���� employee::age ����������<br>";
  else
    echo "���� employee::age �� ����������<br>";

  if(property_exists("employee", "none"))
    echo "���� employee::none ����������<br>";
  else
    echo "���� employee::none �� ����������<br>";
?>
