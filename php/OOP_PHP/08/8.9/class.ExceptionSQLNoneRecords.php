<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.ExceptionSQL.php");

  class ExceptionSQLNoneRecords extends ExceptionSQL
  {
    public function __construct(
                          $message = "������������� ������ �����������")
    {
      parent::__construct($message, 1001);
    }
  }
?>
