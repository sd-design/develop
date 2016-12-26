<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  ///////////////////////////////////////////////////
  // Панель администрирования
  // 2006 (C) IT-студия SoftTime (http://www.softtime.ru)
  ///////////////////////////////////////////////////
  function pager($page, $total, $pnumber, $page_link, $parameters)
  {
    // Вычисляем число страниц в системе
    $number = (int)($total/$pnumber);
    if((float)($total/$pnumber) - $number != 0) $number++;
    // Проверяем есть ли ссылки слева
    if($page - $page_link > 1)
    {
      echo "<a href=$_SERVER[PHP_SELF]?page=1{$parameters}> <nobr>[1-$pnumber]</nobr></a>&nbsp;<em class=currentpage><nobr>&nbsp;...&nbsp;</nobr> </em>&nbsp;";
      // Есть
      for($i = $page - $page_link; $i<$page; $i++)
      {
          echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}> <nobr>[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</nobr></a>&nbsp;";
      }
    }
    else
    {
      // Нет
      for($i = 1; $i<$page; $i++)
      {
          echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}> <nobr>[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</nobr></a>&nbsp;";
      }
    }
    // Проверяем есть ли ссылки справа
    if($page + $page_link < $number)
    {
      // Есть
      for($i = $page; $i<=$page + $page_link; $i++)
      {
        if($page == $i)
          echo "<em class=currentpage><nobr>&nbsp;[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;</nobr> </em>";
        else
          echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}> <nobr>[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</nobr></a>&nbsp;";
      }
      echo "<em class=currentpage><nobr>&nbsp;...&nbsp;</nobr> </em>&nbsp;<a href=$_SERVER[PHP_SELF]?page=$number{$parameters}> <nobr>[".(($number - 1)*$pnumber + 1)."-$total]</nobr></a>&nbsp;";
    }
    else
    {
      // Нет
      for($i = $page; $i<=$number; $i++)
      {
        if($number == $i)
        {
          if($page == $i)
            echo "<em class=currentpage><nobr>&nbsp;[".(($i - 1)*$pnumber + 1)."-$total]&nbsp;</nobr></em>";
          else
            echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}>[".(($i - 1)*$pnumber + 1)."-$total]</a>&nbsp;";
        }
        else
        {
          if($page == $i)
            echo "<em class=currentpage><nobr>&nbsp;[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;</nobr> </em>";
          else
            echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}> <nobr>[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</nobr></a>&nbsp;";
        }
      }
    }
    echo "<br><br>";
  }

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
    $postbody = preg_replace("#\[url\][\s]*((?=http:)[\S]*)[\s]*\[\/url\]#si",'<a href="\\1" target=_blank>\\1</a>',$postbody);
    $postbody = preg_replace("#\[url[\s]*=[\s]*((?=http:)[\S]+)[\s]*\][\s]*([^\[]*)\[/url\]#isU",
                             '<a href="\\1" target=_blank>\\2</a>',
                             $postbody);
    return $postbody;
}
function split_text($matches) 
{
  return wordwrap($matches[1], 35, ' ',1);
}
?>