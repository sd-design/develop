<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ���������� ������ 
  require_once("5.10.php");
 
 // ��������� ������ �� ��������� ��������
  for($i = 0; $i < 10; $i++)
  {
    switch(rand(1,3))
    {
      case 1:
        $arr[] = new fst();
        break;
      case 2:
        $arr[] = new snd();
        break;
      case 3:
        $arr[] = new cmn();
        break;
    }
  }
  // ���������� �������������� ��������� 
  // ������� � �������
  foreach($arr as $obj)
  {
    if($obj instanceof second) echo "������ ������ ".get_class($obj)." 
                                     ��������� ��������� second<br>";
    else echo "������ ������ ".get_class($obj)." �� ��������� ��������� 
               second<br>";
  }
?>
