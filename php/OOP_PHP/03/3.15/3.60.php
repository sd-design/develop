<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // �����
  class cls
  {
    public function __construct($var, $val)
    {
      $this->publ_var = $var;
      $this->priv_var = $val;
    }
    public function __set_state($arr_obj)
    {
      foreach($arr_obj as $key => $value)
      {
        echo "$key => $value<br>";
      }
    }
    public  $publ_var;
    private $priv_var;
  }
  // ������
  $obj = new cls(12, 147);

  // ���������� ����� ������ __set_state()
  $str = var_export($obj, true);

  // ��-�� ������ ���������� ���������� 
  // ������� ��������� ������� ��������������
  $str = preg_replace("|,[\s]*\)|is", ")", $str);

  // �������� ����� __set_state()
  eval($str.';');
?>
