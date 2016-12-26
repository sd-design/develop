<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ���������� ��� ����������� ������
  require_once("config/class.config.php");

  // ��������� �����
  $button_name = "��������";
  $class_name = "field";

  // �������� ���������� ��������
  require_once("utils/top.php");

  $fst = new field_select("fst",
                         "����� ����������<br> ��������",
                          array("������ �����",
                                "������ �����",
                                "������ �����"),
                          array(0, 2),
                          true,
                          3);
  $snd = new field_select("snd",
                         "����� ������<br> ��������",
                          array("������ �����",
                                "������ �����",
                                "������ �����"),
                          0);
  $form = new form(array("fst"       => $fst,
                         "snd"       => $snd),
                   $button_name,
                   $class_name);
  // ������� HTML-����� 
  $form->print_form();

  // �������� ���������� ��������
  require_once("utils/bottom.php");
?>