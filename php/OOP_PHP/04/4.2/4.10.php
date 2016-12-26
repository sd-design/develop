<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class person
  {
    public function __construct($surname, $name, $patronymic, $filename)
    {
      $this->surname = $surname;
      $this->name = $name;
      $this->patronymic = $patronymic;
      $this->filename = $filename;
      // ���������, ���������� �� � ����� $this->filename
      // ���� � ������ �� ��������, ������ � ���������
      $content = file_get_contents($this->filename);
      // ���� ���� � ����� ��� - ���������
      if(strpos($content, "$surname|$name|$patronymic") === false)
      {
        // ���������� ��������� ����� (��������������,
        // ��� ������ �������������� �� ������� �� ������������
        // � �������������)
        $pattern = "#([\d]+).+?$#i";
        if(preg_match($pattern, $content, $out))
        {
          $this->number = $out[1] + 1;
        }
        else $this->number = 1;
        // ���������� ������ � ����
        $fd = fopen($this->filename, "a");
        $str = "{$this->number}|".
               "{$this->surname}|".
               "{$this->name}|".
               "{$this->patronymic}\r\n";
        fwrite($fd, $str);
        fclose($fd);
      }
      // ���� ���� ��� ������������� � ����� - ���������
      // ��� ���������� �����
      else
      {
        $pattern = "#([\d]+)\|$surname\|$name\|$patronymic#i";
        if(preg_match($pattern, $content, $out))
        {
          $this->number = $out[1];
        }
      }
    }
    public function __get($index)
    {
      return $this->$index;
    }

    private $surname;
    private $name;
    private $patronymic;
    private $number;
    private $filename;
  }
?>
