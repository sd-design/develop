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
    public $name;
    private $pr_name;
    private $arr = array();

    public function __get($index)
    {
      return $this->arr[$index];
    }

    public function __set($index, $value)
    {
      $this->arr[$index] = $value;
    }
 }
?>
