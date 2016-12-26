<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class client
  {
    public function __construct($surname, $name, $patronymic)
    {
      $this->surname = $surname;
      $this->name = $name;
      $this->patronymic = $patronymic;
      // Проверяем, зарегистрирован ли в файле employee.txt
      // исполнитель с такими же фамилией, именем и отчеством
      $content = file_get_contents("client.txt");
      // Если исполнителя нет в файле, добавляем
      if(strpos($content, "$surname|$name|$patronymic") === false)
      {
        // Определяем максимальный номер (предполагается,
        // что номера расположены равномерно от минимального
        // к максимальному)
        $pattern = "#([\d]+).+?$#i";
        if(preg_match($pattern, $content, $out))
        {
          $this->number = $out[1] + 1;
        }
        else $this->number = 1;
        // Производим запись в файл
        $fd = fopen("client.txt", "a");
        $str = "{$this->number}|".
               "{$this->surname}|".
               "{$this->name}|".
               "{$this->patronymic}\r\n";
        fwrite($fd, $str);
        fclose($fd);
      }
      // Если исполнитель уже зарегистрирован в файле,
      // извлекаем его уникальный номер
      else
      {
        $pattern = "#([\d]+)\|$surname\|$name\|$patronymic#i";
        if(preg_match($pattern, $content, $out))
        {
          $this->number = $out[1];
        }
      }
    }
    public function get_surname()
    {
      return $this->surname;
    }
    public function get_name()
    {
      return $this->name;
    }
    public function get_patronymic()
    {
      return $this->patronymic;
    }
    public function get_number()
    {
      return $this->number;
    }

    private $surname;
    private $name;
    private $patronymic;
    private $number;
  }
?>
