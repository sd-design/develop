<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class point
  {
    public function get_point($x = 0, $y = 0)
    {
      return new point($x, $y);
    }
    public function get_x()
    {
      return $this->X;
    }
    public function get_y()
    {
      return $this->Y;
    }

    private $X;
    private $Y;
    private function __construct($x = 0, $y = 0)
    {
      $this->X = $x;
      $this->Y = $y;
    }
  }
?>
