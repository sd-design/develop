<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.ExceptionSQLError.php");
  require_once("class.ExceptionSQLNoneRecords.php");

  try
  {
    try
    {
      if(rand(0,1)) throw new ExceptionSQLError();
      else throw new ExceptionSQLNoneRecords();
    }
    catch(ExceptionSQL $exp)
    {
      echo "ExceptionSQL-���������� ".get_class($exp)."<br>";
      // �������� ���������� ����� �� �������
      throw $exp;
    }
  }
  catch(ExceptionSQLError $exp)
  {
    echo "ExceptionSQLError-����������";
  }
  catch(ExceptionSQLNoneRecords $exp)
  {
    echo "ExceptionNoneRecords-����������";
  }
?>
