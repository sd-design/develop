<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  /** �������� �����, ��� ������������
      ������������ ��������� ������. */
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
