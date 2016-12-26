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
    $query = "SELECT * FROM exception";
    $ext = mysql_query($query);
    // ���� ��������� ������ - ���������� ����������
    // ExceptionSQLError()
    if(!$ext) throw new ExceptionSQLError();
    // ���� � ������� exception �����������
    // ������ - ���������� ����������
    if(!mysql_num_rows($ext)) throw new ExceptionSQLNoneRecords();
    while($exception = mysql_fetch_array($ext))
    {
      echo $exception['message']."<br>";
    }
  }
  catch(ExceptionSQLError $exp)
  {
    // ������ � SQL-�������
    echo "��������� ������ ��� ���������� SQL-�������<br>";
    echo "{$exp->getMessage()}<br>";
  }
  catch(ExceptionSQLNoneRecords $exp)
  {
    // ����������� ������
    echo "������� exception �� �������� �������<br>";
  }
?>
