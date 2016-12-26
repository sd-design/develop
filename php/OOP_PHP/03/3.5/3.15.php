<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class file_access
  {
    public function __construct($filename)
    {
      // Открываем текстовый файл
      // для чтения
      $this->fd = fopen($filename, "r");
    }

    public function readline()
    {
      // Читаем 10000 символов; на самом деле
      // функция fread() прекращает чтение
      // символов, если находит перевод строки
      $str = fgets($this->fd, 10000);
      // Если достигнут конец файла, устанавливаем
      // курсор на начало
      if(feof($this->fd)) fseek($this->fd, 0);
      // Возвращаем прочитанную строку
      return $str;
    }

    public function __destruct()
    {
      // Закрываем файл
      fclose($this->fd);
    }

    // Файловый дескриптор
    private $fd;
  }

  $obj = new file_access("text.txt");
  for($i = 0; $i < 5; $i++) echo "{$obj->readline()}<br>";
?>
