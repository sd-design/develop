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
    public function __construct($surname, $name, $patronymic, $age = 18)
    {
      $this->surname    = $surname;
      $this->name       = $name;
      $this->patronymic = $patronymic;
      $this->age        = $age;
    }
    private function __get($index)
    {
      if(isset($this->$index))
      {
        return $this->$index;
      }
      else new Exception("���� $index �� ����������");
    }
    private function __set($index, $value)
    {
      if(isset($this->$index))
      {
          $this->$index = $value;
      }
      else new Exception("���� $index �� ����������");
    }

    private $surname;
    private $name;
    private $patronymic;
    private $age;
  }
?>
