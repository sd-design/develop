<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Êóçíåöîâ Ì.Â., Ñèìäÿíîâ È.Â.
  // Îáúåêòíî îğèåíòèğîâàííîå ïğîãğàììèğîâàíèå íà PHP
  // IT-ñòóäèÿ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Âûñòàâëÿåì óğîâåíü îáğàáîòêè îøèáîê 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Ïîäêëş÷àåì îáúÿâëåíèå êëàññà
  require_once("class.point.php");

  $point1 = point::get_point(1, 1);
  $point2 = point::get_point(2, 2);
  echo "{$point1->get_X()} {$point1->get_Y()}<br>";
  echo "{$point2->get_X()} {$point2->get_Y()}<br>";
?>
