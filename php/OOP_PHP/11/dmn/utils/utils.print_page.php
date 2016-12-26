<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  function print_page($postbody)
  {
    // Разрезаем слишком длинные слова
    $postbody = preg_replace_callback(
              "|([a-zа-я\d!]{35,})|i",
              "split_text",
              $postbody);
    // Предотвращаем XSS-инъекции
    $postbody = htmlspecialchars($postbody, ENT_QUOTES);
    // Тэги
    $pattern = "#\[b\](.+)\[\/b\]#isU";
    $postbody = preg_replace($pattern, 
                             '<b>\\1</b>', 
                             $postbody);
    $pattern = "#\[i\](.+)\[\/i\]#isU";
    $postbody = preg_replace($pattern, 
                             '<i>\\1</i>', 
                             $postbody);
    $pattern = "#\[url\][\s]*((?=(http:|mailto:))[\S]*)[\s]*\[\/url\]#si";
    $postbody = preg_replace($pattern, 
                             '<a href="\\1" target=_blank>\\1</a>', 
                             $postbody);
    $pattern = "#\[url[\s]*=[\s]*((?=(http:|mailto:))[\S]+)[\s]*\][\s]*([^\[]*)\[/url\]#isU";
    $postbody = preg_replace($pattern,
                             '<a href="\\1" target=_blank>\\3</a>',
                             $postbody);
    return $postbody;
  }
  function split_text($matches) 
  {
    return wordwrap($matches[1], 35, ' ',1);
  }
?>