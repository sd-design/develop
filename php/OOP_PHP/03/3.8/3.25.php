<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class/class.employee.php");
  require_once("class/class.client.php");
  require_once("class/class.contract.php");

  // ��������� ������ �� ��������� ��������
  for($i = 0; $i < 10; $i++)
  {
    switch(rand(1,3))
    {
      case 1:
        $arr[] = new client("�������", "�����", "��������");
        break;
      case 2:
        $arr[] = new employee("�������", "����", "�����������");
        break;
      case 3:
        $arr[] = new contract(time(), 
                            time() + 30*24*60*60, 
                            "��������", 
                            "10000", 
                            "�������", 
                            "�����", 
                            "��������",
                            "�������",
                            "����",
                            "�����������");
        break;
    }
  }
  // ���������� �������������� ��������� 
  // ������� � �������
  foreach($arr as $obj)
  {
    echo get_class($obj)."<br>";
  }
?>
