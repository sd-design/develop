<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class implode
  {
    public function __construct($delimiter, $arr)
    {
      $this->arr       = $arr;
      $this->delimiter = $delimiter;
    }
    public function __toString()
    {
      $str = "";
      foreach($this->arr as $value)
      {
        $str .= $value.$this->delimiter;
      }
      // ������� ��������� ������� $delimiter
      return substr($str, 0, strlen($str) - strlen($this->delimiter));
    }
 }
?>
