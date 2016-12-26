<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class person
  {
    public function __construct($surname, $name, $patronymic, $filename)
    {
      $this->surname = $surname;
      $this->name = $name;
      $this->patronymic = $patronymic;
      $this->filename = $filename;
      // Проверяем, существует ли в файле $this->filename
      // лицо с такими же фамилией, именем и отчеством
      $content = file_get_contents($this->filename);
      // Если лица в файле нет - добавляем
      if(strpos($content, "$surname|$name|$patronymic") === false)
      {
        // Определяем последний номер (предполагается,
        // что номера распределяются по очереди от минимального
        // к максимальному)
        $pattern = "#([\d]+).+?$#i";
        if(preg_match($pattern, $content, $out))
        {
          $this->number = $out[1] + 1;
        }
        else $this->number = 1;
        // Производим запись в файл
        $fd = fopen($this->filename, "a");
        $str = "{$this->number}|".
               "{$this->surname}|".
               "{$this->name}|".
               "{$this->patronymic}\r\n";
        fwrite($fd, $str);
        fclose($fd);
      }
      // Если лицо уже зафиксировано в файле - извлекаем
      // его уникальный номер
      else
      {
        $pattern = "#([\d]+)\|$surname\|$name\|$patronymic#i";
        if(preg_match($pattern, $content, $out))
        {
          $this->number = $out[1];
        }
      }
    }
    public function __get($index)
    {
      return $this->$index;
    }

    private $surname;
    private $name;
    private $patronymic;
    private $number;
    private $filename;
  }
?>
