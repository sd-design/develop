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
      return new cls($arr_obj['publ_var'], $arr_obj['priv_var']);
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

  // ������� ������ $new_obj - �����
  // ������� $obj
  eval('$new_obj = '.$str.';');

  // ������� ���� ������ ������� $new_obj
  echo "<pre>";
  print_r($new_obj);
  echo "</pre>";
?>
