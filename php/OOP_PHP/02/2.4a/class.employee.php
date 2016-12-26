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
    // Открытые члены
    public $surname;
    public $name;
    public $patronymic;
    
    // Открытые методы
    public function get_age()
    {
      require_once("method/class.employee.get_age.php");
    }
    public function set_age($val)
    {
      return require_once("method/class.employee.set_age.php");
    }
    public function get_info()
    {
      return require_once("method/class.employee.get_info.php");
    }
    public function get_full_info()
    {
      return require_once("method/class.employee.get_full_info.php");
    }

    // Закрытые члены
    private $age;
  }
?>
