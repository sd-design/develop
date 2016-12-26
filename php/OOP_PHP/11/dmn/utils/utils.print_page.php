<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  function print_page($postbody)
  {
    // ��������� ������� ������� �����
    $postbody = preg_replace_callback(
              "|([a-z�-�\d!]{35,})|i",
              "split_text",
              $postbody);
    // ������������� XSS-��������
    $postbody = htmlspecialchars($postbody, ENT_QUOTES);
    // ����
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