<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Переменная
  $var = 100;

  // Массив
  $arr = array(1, 2, 3, array(4, 5), array(6, 7));

  // Класс
  class cls
  {
    public function __construct($var, $val)
    {
      $this->publ_var = $var;
      $this->priv_var = $val;
    }
    public  $publ_var;
    private $priv_var;
  }
  // Объект
  $obj = new cls(12, 147);

  echo "<pre>";
  var_export($var);
  var_export($arr);
  var_export($obj);
  echo "<pre>";
?>
