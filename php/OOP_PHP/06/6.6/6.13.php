<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class cls
  {
    public function get_point()
    {
       return "Вызов функции ".__FUNCTION__.
              "<br>файла ".__FILE__.
              "<br>в строке ".__LINE__; // 8 строка
    }
  }

  echo cls::get_point(); // 12 строка
?>
