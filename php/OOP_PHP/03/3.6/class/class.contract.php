<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.employee.php");
  require_once("class.client.php");

  class contract
  {
    public $client;
    public $employee;
    // Метод, инициирующий объект
    public function __construct($begin_date,
                         $end_date,
                         $description,
                         $price,
                         $client_name,
                         $client_surname,
                         $client_patronymic,
                         $employee_name,
                         $employee_surname,
                         $employee_patronymic)
    {
      $this->begin_date  = $begin_date;
      $this->end_date    = $end_date;
      $this->description = $description;
      $this->price       = $price;
      $this->client      = new client($client_name, 
                                      $client_surname, 
                                      $client_patronymic);
      $this->employee    = new employee($employee_name, 
                                        $employee_surname, 
                                        $employee_patronymic);
      // Помещаем данные в файл contract.txt
      $fd = fopen("contract.txt", "a");
      $str = "{$this->client->get_number()}|".
             "{$this->employee->get_number()}|".
             "{$this->begin_date}|".
             "{$this->end_date}|".
             "{$this->description}|".
             "{$this->price}\r\n";
      fwrite($fd, $str);
      fclose($fd);
    }
    // Методы, возвращающие значения закрытых
    // переменных
    public function get_begin_date()
    {
      return $this->begin_date;
    }
    public function get_end_date()
    {
      return $this->end_date;
    }
    public function get_description()
    {
      return $this->description;
    }
    public function get_price()
    {
      return $this->price;
    }
    private $begin_date;
    private $end_date;
    private $description;
    private $price;
  }
?>
