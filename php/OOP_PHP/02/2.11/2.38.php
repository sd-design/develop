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
    // Открытый интерфейс класса
    public function get_point($X, $Y)
    {
      $obj = new point();
      $obj->set_point($X, $Y);
      return $obj;
    }
    public function get_X()
    {
      return $this->X;
    }
    public function get_Y()
    {
      return $this->Y;
    }

    // Закрытые члены и методы класса
    private $X;
    private $Y;
    private function set_point($X, $Y)
    {
      $this->X = $X;
      $this->Y = $Y;
    }
  }
?>
