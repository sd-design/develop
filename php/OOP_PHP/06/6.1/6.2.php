<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class cls
  {
     public static $staticvar = 100;
     public function set_staticvar($val)
     {
       $this->staticvar = $val;
     }
  }

  $obj = new cls();

  echo "<pre>";
  print_r($obj);
  echo "</pre>";

  $obj->set_staticvar(20);
  
  echo cls::$staticvar; // 100

  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
