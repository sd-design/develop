<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class client
  {
    public function __construct($surname, $name, $patronymic)
    {
      $this->surname = $surname;
      $this->name = $name;
      $this->patronymic = $patronymic;
      // ���������, ��������������� �� � ����� employee.txt
      // ����������� � ������ �� ��������, ������ � ���������
      $content = file_get_contents("client.txt");
      // ���� ����������� ��� � �����, ���������
      if(strpos($content, "$surname|$name|$patronymic") === false)
      {
        // ���������� ������������ ����� (��������������,
        // ��� ������ ����������� ���������� �� ������������
        // � �������������)
        $pattern = "#([\d]+).+?$#i";
        if(preg_match($pattern, $content, $out))
        {
          $this->number = $out[1] + 1;
        }
        else $this->number = 1;
        // ���������� ������ � ����
        $fd = fopen("client.txt", "a");
        $str = "{$this->number}|".
               "{$this->surname}|".
               "{$this->name}|".
               "{$this->patronymic}\r\n";
        fwrite($fd, $str);
        fclose($fd);
      }
      // ���� ����������� ��� ��������������� � �����,
      // ��������� ��� ���������� �����
      else
      {
        $pattern = "#([\d]+)\|$surname\|$name\|$patronymic#i";
        if(preg_match($pattern, $content, $out))
        {
          $this->number = $out[1];
        }
      }
    }
    public function get_surname()
    {
      return $this->surname;
    }
    public function get_name()
    {
      return $this->name;
    }
    public function get_patronymic()
    {
      return $this->patronymic;
    }
    public function get_number()
    {
      return $this->number;
    }

    private $surname;
    private $name;
    private $patronymic;
    private $number;
  }
?>
