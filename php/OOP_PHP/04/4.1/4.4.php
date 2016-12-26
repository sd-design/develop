<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Класс "договор между организацией и сотрудником
  // о приеме последнего на работу"
  class contract
  {
     // Члены класса
     private $surname;
     private $name;
     private $patronymic;
     private $age;
     private $date;
     private $description;
     // Конструктор
     __construct contract($sn, $nm, $pt, $ag, $dt, $ds)
     {
        $this->surname = $sn;
        $this->name = $nm;
        $this->patronymic = $pt;
        $this->age = $ag;
        $this->date = $dt;
        $this->description = $ds;
     }
     // Методы доступа к объектам класса
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
     // Остальная реализация класса
     //...
  }
?>
