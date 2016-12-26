<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  ////////////////////////////////////////////////////////////
  // ������� ��������� bbCode
  ////////////////////////////////////////////////////////////
function print_page($postbody)
{
    // ��������� ������� ������� �����
    $postbody = preg_replace_callback(
              "|([a-z�-�\d!]{35,})|i",
              "split_text",
              $postbody);
    // ����
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