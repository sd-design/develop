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
  require_once("class/class.field.php");
  require_once("class/class.field.text.php");
  require_once("class/class.field.text.english.php");
  require_once("class/class.field.text.int.php");
  require_once("class/class.field.text.email.php");
  require_once("class/class.field.password.php");
  require_once("class/class.field.textarea.php");
  require_once("class/class.field.hidden.php");
  require_once("class/class.field.hidden.int.php");
  require_once("class/class.field.radio.php");
  require_once("class/class.field.select.php");
  require_once("class/class.field.select.city.php");
  require_once("class/class.field.checkbox.php");
  require_once("class/class.field.file.php");
  require_once("class/class.field.date.php");
  require_once("class/class.field.datetime.php");
  require_once("class/class.field.paragraph.php");
  require_once("class/class.field.title.php");

  require_once("class/class.forms.php");

  require_once("class/exception.member.php");
  require_once("class/exception.mysql.php");
  require_once("class/exception.object.php");
?>