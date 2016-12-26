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
    private $arr = array();

    private function __get($index)
    {
      return $this->arr[$index];
    }

    private function __set($index, $value)
    {
      $this->arr[$index] = $value;
    }

    private function __isset($index)
    {
      return isset($this->arr[$index]);
    }
    
    private function __unset($index)
    {
      unset($this->arr[$index]);
    }
 }
?>
