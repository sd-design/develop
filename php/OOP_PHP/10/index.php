<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем все необходимые классы
  require_once("config/class.config.php");

  // Параметры формы
  $button_name = "Добавить";
  $class_name = "field";

  // Включаем завершение страницы
  require_once("utils/top.php");

  $fst = new field_select("fst",
                         "Выбор нескольких<br> значений",
                          array("Первый пункт",
                                "Второй пункт",
                                "Третий пункт"),
                          array(0, 2),
                          true,
                          3);
  $snd = new field_select("snd",
                         "Выбор одного<br> значения",
                          array("Первый пункт",
                                "Второй пункт",
                                "Третий пункт"),
                          0);
  $form = new form(array("fst"       => $fst,
                         "snd"       => $snd),
                   $button_name,
                   $class_name);
  // Выводим HTML-форму 
  $form->print_form();

  // Включаем завершение страницы
  require_once("utils/bottom.php");
?>