<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  try
  {
    // ���������� ���������� ������� print_user()
    require_once("function.print_user.php");
    // �������� ������� 
    print_user();
  }
  catch(Exception $exp)
  {
    // ���� ��������� �������������� ��������
    $url = "error.php?id={$exp->getCode()}";
    echo "<HTML><HEAD>
           <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$url'>
          </HEAD></HTML>";    
  }
?>
