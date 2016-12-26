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
  // Функция обработки bbCode
  ////////////////////////////////////////////////////////////
function print_page($postbody)
{
    // Разрезаем слишком длинные слова
    $postbody = preg_replace_callback(
              "|([a-zа-я\d!]{35,})|i",
              "split_text",
              $postbody);
    // Тэги
    $postbody = preg_replace("#\[b\](.+)\[\/b\]#isU",'<b>\\1</b>',$postbody);
    $postbody = preg_replace("#\[i\](.+)\[\/i\]#isU",'<i>\\1</i>',$postbody);
    $postbody = preg_replace("#\[url\][\s]*([\S]*)[\s]*\[\/url\]#si",'<a href="\\1" target=_blank>\\1</a>',$postbody);
    $postbody = preg_replace("#\[url[\s]*=[\s]*([\S]+)[\s]*\][\s]*([^\[]*)\[/url\]#isU",
                             '<a href="\\1" target=_blank>\\2</a>',
                             $postbody);
    if(strstr($postbody, "[/table]"))
    {
      $postbody = str_replace("[table]","<table width=\"100%\" cellpadding=\"2\" cellspacing=\"1\" border=1 style=\"border-collapse: collapse\">",$postbody);
      $postbody = str_replace("[/table]","</table>",$postbody);
      $postbody = str_replace("[tr]","<tr>",$postbody);
      $postbody = str_replace("[/tr]","</tr>",$postbody);
      $postbody = str_replace("[td]","<td class=\"main_txt\" sytle=\"border 2px solid;\">",$postbody);
      $postbody = str_replace("[/td]","</td>",$postbody);
      return $postbody;
    }
    else return nl2br($postbody);
}
function split_text($matches) 
{
  return wordwrap($matches[1], 35, ' ',1);
}
?>