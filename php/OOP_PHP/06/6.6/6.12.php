<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  function get_point()
  {
     return "����� ������� ".__FUNCTION__.
            "<br>����� ".__FILE__.
            "<br>� ������ ".__LINE__; // 6 ������
  }

  echo get_point(); // 9 ������
?>
