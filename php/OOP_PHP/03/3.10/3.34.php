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
      return $this->$index;
    }
    private function __set($index, $value)
    {
      if(isset($this->$index))
      {
        if($index != "age")
        {
          $this->$index = $value;
        }
        else
        {
          if($value >= 18 && $value <= 60)
          {
            $this->$index = $value;
          }
        }
      }
    }
    private function __isset($index)
    {
      return isset($this->$index);
    }

    private $surname;
    private $name;
    private $patronymic;
    private $age;
  }
?>
