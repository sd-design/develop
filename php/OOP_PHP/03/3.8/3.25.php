<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class/class.employee.php");
  require_once("class/class.client.php");
  require_once("class/class.contract.php");

  // Формируем массив из случайных объектов
  for($i = 0; $i < 10; $i++)
  {
    switch(rand(1,3))
    {
      case 1:
        $arr[] = new client("Борисов", "Игорь", "Иванович");
        break;
      case 2:
        $arr[] = new employee("Корнеев", "Иван", "Григорьевич");
        break;
      case 3:
        $arr[] = new contract(time(), 
                            time() + 30*24*60*60, 
                            "Описание", 
                            "10000", 
                            "Борисов", 
                            "Игорь", 
                            "Иванович",
                            "Корнеев",
                            "Иван",
                            "Григорьевич");
        break;
    }
  }
  // Определяем принадлежность элементов 
  // массива к классам
  foreach($arr as $obj)
  {
    echo get_class($obj)."<br>";
  }
?>
