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
    const NAME = "cls";
    public function method()
    {
      // echo $this->NAME; // ��������� ���������
      echo self::NAME;
      echo "<br>";
      echo cls::NAME;
      echo "<br>";
    }
  }
  
  echo cls::NAME;
?>
