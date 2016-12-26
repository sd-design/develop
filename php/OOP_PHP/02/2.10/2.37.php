<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем объявление класса
  require_once("class.contract.php");

  // Объявляем объект класса contract
  $cnt = new contract();
  $cnt->init_object(time(), // Текущая дата
                    time() + 86400*30, // Месяц спустя текущей даты
                    "описание контракта",
                    "10000.00",
                    "Иван",
                    "Иванов",
                    "Иванович",
                    "Петр",
                    "Петров",
                    "Петрович");
  // Клиент
  echo $cnt->client->surname." ".
       $cnt->client->name[0].". ".
       $cnt->client->patronymic[0].".<br>";
  // Исполнитель
  echo $cnt->employee->surname." ".
       $cnt->employee->name[0].". ".
       $cnt->employee->patronymic[0].".<br>";
?>
