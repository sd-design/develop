<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class minmax
  {
    public function min($val, $val1, $val3)
    {
      echo "����� ��������� ������ min()";
    }
    private function max($val, $val1, $val3)
    {
      echo "����� ��������� ������ max()";
    }
    private function __call($method, $arg)
    {
      if(!is_array($arg)) return false;
      $value = $arg[0];
      if($method == "min")
      {
        for($i = 0; $i < count($arg); $i++)
        {
          if($arg[$i] < $value) $value = $arg[$i];
        }
      }
      if($method == "max")
      {
        for($i = 0; $i < count($arg); $i++)
        {
          if($arg[$i] > $value) $value = $arg[$i];
        }
      }
      return $value;
    }
  }
?>
