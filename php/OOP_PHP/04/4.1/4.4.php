<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ����� "������� ����� ������������ � �����������
  // � ������ ���������� �� ������"
  class contract
  {
     // ����� ������
     private $surname;
     private $name;
     private $patronymic;
     private $age;
     private $date;
     private $description;
     // �����������
     __construct contract($sn, $nm, $pt, $ag, $dt, $ds)
     {
        $this->surname = $sn;
        $this->name = $nm;
        $this->patronymic = $pt;
        $this->age = $ag;
        $this->date = $dt;
        $this->description = $ds;
     }
     // ������ ������� � �������� ������
     public function getSurname()
     {
       return $this->surname;
     }
     public function getName()
     {
       return $this->name;
     }
     public function getPatronymic()
     {
       return $this->patronymic;
     }
     public function getAge()
     {
       return $this->age;
     }
     public function getDate()
     {
       return $this->date;
     }
     public function getDescription()
     {
       return $this->description;
     }
     // ��������� ���������� ������
     //...
  }
?>
