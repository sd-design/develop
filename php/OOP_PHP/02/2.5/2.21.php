<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class employee
  {
    public $surname;
    public $name;
    public $patronymic;
    
    public function set_age($val)
    {
      $val = intval($val);
      if($val >= 18 && $val <= 65)
      {
         $this->age = $val;
      }
    }
  }
?>
