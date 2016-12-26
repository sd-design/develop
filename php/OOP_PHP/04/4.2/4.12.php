<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Êóçíåöîâ Ì.Â., Ñèìäÿíîâ È.Â.
  // Îáúåêòíî îğèåíòèğîâàííîå ïğîãğàììèğîâàíèå íà PHP
  // IT-ñòóäèÿ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Âûñòàâëÿåì óğîâåíü îáğàáîòêè îøèáîê 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.client.php");
  require_once("class.employee.php");

  $obj = new client("Êîğíååâ", "Èâàí", "Ãğèãîğüåâè÷");

  echo "{$obj->number}<br>";

  $obj = new employee("Áîğèñîâ", "Èãîğü", "Èâàíîâè÷");

  echo "{$obj->number}<br>";
?>
