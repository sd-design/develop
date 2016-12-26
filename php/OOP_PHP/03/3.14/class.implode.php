<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class implode
  {
    public function __construct($delimiter, $arr)
    {
      $this->arr       = $arr;
      $this->delimiter = $delimiter;
    }
    public function __toString()
    {
      $str = "";
      foreach($this->arr as $value)
      {
        $str .= $value.$this->delimiter;
      }
      // Удаляем последний элемент $delimiter
      return substr($str, 0, strlen($str) - strlen($this->delimiter));
    }
 }
?>
