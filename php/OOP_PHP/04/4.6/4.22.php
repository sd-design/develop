<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class base
  {
    public function __construct()
    {
      echo get_parent_class($this);
      echo "<br>";
    }
  }
  class derived extends base
  {
    public function __construct()
    {
      echo get_parent_class($this);
      echo "<br>";
    }
  }
  class postderived extends derived
  {
    public function __construct()
    {
      echo get_parent_class($this);
      echo "<br>";
    }
  }
?>
