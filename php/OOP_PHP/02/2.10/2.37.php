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
  require_once("class.contract.php");

  // ��������� ������ ������ contract
  $cnt = new contract();
  $cnt->init_object(time(), // ������� ����
                    time() + 86400*30, // ����� ������ ������� ����
                    "�������� ���������",
                    "10000.00",
                    "����",
                    "������",
                    "��������",
                    "����",
                    "������",
                    "��������");
  // ������
  echo $cnt->client->surname." ".
       $cnt->client->name[0].". ".
       $cnt->client->patronymic[0].".<br>";
  // �����������
  echo $cnt->employee->surname." ".
       $cnt->employee->name[0].". ".
       $cnt->employee->patronymic[0].".<br>";
?>
