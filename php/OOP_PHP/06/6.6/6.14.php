<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class cls
  {
    public function get_point()
    {
       return "����� ������ ".__METHOD__.
              "<br>������ ".__CLASS__.
              "<br>� ����� ".__FILE__.
              "<br>� ������ ".__LINE__; // 9 ������
    }
  }

  echo cls::get_point(); // 13 ������
?>
