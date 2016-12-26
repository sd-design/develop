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
    public function init_object($surname, 
                                $name = "нет данных", 
                                $patronymic = "нет данных", 
                                $age = "нет данных")
    {
      $this->surname = $surname;
      $this->name = $name;
      $this->patronymic = $patronymic;
      $this->age = $age;
    }
    // Остальные методы класса
    // ...
    
    // Закрытые члены класса
    private $surname;
    private $name;
    private $patronymic;
    private $age;
  }
?>
