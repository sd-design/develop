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
     public $surname;
     public $name;
     public $patronymic;
     public $age;
     public $date;
     public $description;
     // Конструктор
     function __construct($sn, $nm, $pt, $ag, $dt, $ds)
     {
        $this->surname = $sn;
        $this->name = $nm;
        $this->patronymic = $pt;
        $this->age = $ag;
        $this->date = $dt;
        $this->description = $ds;
     }
     // Остальная реализация класса
     // ...
  }
  // Создание объекта
  $obj = new contract("Сидоров", 
                      "Иван", 
                      "Иванович", 
                      36, 
                      "2003.01.15", 
                      "инженер-программист");
?>
