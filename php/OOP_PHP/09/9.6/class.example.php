<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  /** Тестовый класс, для демонстрации
      возможностей отражения класса. */
  class example
  {
    const NAME = "cls";
    
    private $first;
    public $second;
    private $third;

    static $count = 0;

    public function __construct($first, 
                                $second, 
                                $third)
    {
      $this->first  = $first;
      $this->second = $second;
      $this->third  = $third;
    }

    public function getFirst()
    {
      return $this->first;
    }

    public function helloWorld()
    {
      return "Hello world";
    }
  }
?>
