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
    public function init_object($surname, 
                                $name = "��� ������", 
                                $patronymic = "��� ������", 
                                $age = "��� ������")
    {
      $this->surname = $surname;
      $this->name = $name;
      $this->patronymic = $patronymic;
      $this->age = $age;
    }
    // ��������� ������ ������
    // ...
    
    // �������� ����� ������
    private $surname;
    private $name;
    private $patronymic;
    private $age;
  }
?>
