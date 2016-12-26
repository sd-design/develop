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
    private $var;
    public function __construct($var = 100)
    {
      $this->var = $var;
    }
    public function __destruct()
    {
      echo "����� ����������� �������� ������<br>";
    }
  }
  class derived extends base
  {
    private $val;
    public function __construct($var = 100, $val = 100)
    {
      parent::__construct($var);
      $this->val = $val;
    }
    public function __destruct()
    {
      parent::__destruct();
      echo "����� ����������� ������������ ������<br>";
    }
  }

  $obj = new derived(20, 20);
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
?>
