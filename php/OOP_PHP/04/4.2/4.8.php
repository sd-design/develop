<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Базовый класс
  class base
  {
    public $var;
    public function print_var()
    {
      echo $this->var;
    }
  }
  // Производный класс
  class derived extends base
  {
    public $val;
    public function print_val()
    {
      echo $this->val;
    }
  }
?> 
