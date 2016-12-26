<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class recurse
  {
    public function list_struct($parameters)
    {
      if(is_array($parameters))
      {
        foreach($parameters as $val) $this->list_struct($val);
      }
      else echo $parameters."<br>";
    }
  }
?>
