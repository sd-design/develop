<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  function exception_handler($exp)
  {
    echo "�� ���������� ��������� ".get_class($exp);
  }

  set_exception_handler("exception_handler");

  throw new Exception();

  echo "��� ������ ������� �� ����� ��������";
?>
