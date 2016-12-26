<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class file_access
  {
    public function __construct($filename)
    {
      // ��������� ��������� ����
      // ��� ������
      $this->fd = fopen($filename, "r");
    }

    public function readline()
    {
      // ������ 10000 ��������; �� ����� ����
      // ������� fread() ���������� ������
      // ��������, ���� ������� ������� ������
      $str = fgets($this->fd, 10000);
      // ���� ��������� ����� �����, �������������
      // ������ �� ������
      if(feof($this->fd)) fseek($this->fd, 0);
      // ���������� ����������� ������
      return $str;
    }

    public function __destruct()
    {
      // ��������� ����
      fclose($this->fd);
    }

    // �������� ����������
    private $fd;
  }

  $obj = new file_access("text.txt");
  for($i = 0; $i < 5; $i++) echo "{$obj->readline()}<br>";
?>
