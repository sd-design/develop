<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  function catch_exception()
  {
    try
    {
      require_once("generate.php");
    }
    catch(ExceptionSQLError $exp)
    {
      echo "ExceptionSQLError-����������";
    }
    catch(ExceptionSQLNoneRecords $exp)
    {
      echo "ExceptionSQLNoneRecords-����������";
    }
  }
?>
