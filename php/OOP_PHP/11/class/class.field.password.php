<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  ////////////////////////////////////////////////////////////
  // ��������� ���� ��� ������ password
  ////////////////////////////////////////////////////////////

  class field_password extends field_text
  {
    // ����������� ������
    function __construct($name, 
                   $caption, 
                   $is_required = false, 
                   $value = "",
                   $maxlength = 255,
                   $size = 41,
                   $parameters = "", 
                   $help = "",
                   $help_url = "")
    {
      // �������� ����������� �������� ������ field_text ��� 
      // ������������� ��� ������
      parent::__construct($name, 
                   $caption, 
                   $is_required, 
                   $value,
                   $maxlength,
                   $size,
                   $parameters, 
                   $help,
                   $help_url);
       // ����� field_text ����������� ����� type
       // �������� text, ��� ������ ���� �����
       // ������� ��������� �������� password
       $this->type = "password";
    }
  }
?>