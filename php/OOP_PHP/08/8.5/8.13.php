<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
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
      else new Exception("Член $index не существует");
    }
    private function __set($index, $value)
    {
      if(isset($this->$index))
      {
          $this->$index = $value;
      }
      else new Exception("Член $index не существует");
    }

    private $surname;
    private $name;
    private $patronymic;
    private $age;
  }
?>
