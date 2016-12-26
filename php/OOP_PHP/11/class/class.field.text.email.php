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
  // ��������� ���� ��� e-mail
  ////////////////////////////////////////////////////////////

  class field_text_email extends field_text
  {
    // �����, ����������� ������������ ���������� ������
    function check()
    {
      if($this->is_required || !empty($this->value))
      {
        $pattern = "#^[-0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$#i";
        if (!preg_match($pattern, $this->value))
        {
          return "������� e-mail � ���� <i>something@server.com</i>";
        }
      }

      return "";
    }
  }
?>