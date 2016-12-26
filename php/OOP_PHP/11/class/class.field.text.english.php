<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  ////////////////////////////////////////////////////////////
  // Текстовое поле для английского текста
  ////////////////////////////////////////////////////////////

  class field_text_english extends field_text
  {
    // Метод, проверяющий корректность переданных данных
    function check()
    {
      // Обезопасить текст перед внесением в базу данных
      if (!get_magic_quotes_gpc())
      {
        $this->value = mysql_escape_string($this->value);
      }
      if($this->is_required) $pattern = "|^[a-z]+$|i";
      else $pattern = "|^[a-z]*$|i";

      // Проверяем поле value на английский символ
      if(!preg_match($pattern, $this->value))
      {
        return "Поле \"{$this->caption}\" должно содержать лишь английские символы";
      }

      return "";
    }
  }
?>