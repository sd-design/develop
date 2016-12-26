<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ����������
  $var = 100;

  // ������
  $arr = array(1, 2, 3, array(4, 5), array(6, 7));

  // �����
  class cls
  {
    public function __construct($var, $val)
    {
      $this->publ_var = $var;
      $this->priv_var = $val;
    }
    public  $publ_var;
    private $priv_var;
  }
  // ������
  $obj = new cls(12, 147);

  echo "<pre>";
  var_export($var);
  var_export($arr);
  var_export($obj);
  echo "<pre>";
?>
