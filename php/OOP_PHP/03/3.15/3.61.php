<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Класс
  class cls
  {
    public function __construct($var, $val)
    {
      $this->publ_var = $var;
      $this->priv_var = $val;
    }
    public function __set_state($arr_obj)
    {
      return new cls($arr_obj['publ_var'], $arr_obj['priv_var']);
    }
    public  $publ_var;
    private $priv_var;
  }
  // Объект
  $obj = new cls(12, 147);

  // Возвращаем вызов метода __set_state()
  $str = var_export($obj, true);

  // Из-за ошибки реализации приходится 
  // удалять последнюю запятую самостоятельно
  $str = preg_replace("|,[\s]*\)|is", ")", $str);

  // Создаем объект $new_obj - копию
  // объекта $obj
  eval('$new_obj = '.$str.';');

  // Выводим дамп нового объекта $new_obj
  echo "<pre>";
  print_r($new_obj);
  echo "</pre>";
?>
