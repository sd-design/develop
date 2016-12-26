<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class point
  {
    public function get_point($x = 0, $y = 0, $z = "none")
    {
      if($z == "none") return new point($x, $y);
      else return new point3($x, $y, $z);
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
