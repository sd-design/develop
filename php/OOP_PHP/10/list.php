<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // �������� ��������� ��������
  require_once("utils/top.php");

  // ���������� ��� ����������� ������
  require_once("config.php");

  try
  {
    $query = "SELECT * FROM users";
    $usr = mysql_query($query);
    if(!$usr) 
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                               "������ ��������� � ������ �������������");

    // ���� ������� ���� �� ���� ������
    // ������� ������ �������������
    if(mysql_num_rows($usr))
    {
      while($user = mysql_fetch_array($usr))
      {
        echo "<a href=edituser.php?id_user=$user[id_user]>".
                htmlspecialchars($user['name'], ENT_QUOTES).
             "</a><br>";
      }
    }
  }
  catch(ExceptionMySQL $exc) { require("exception_mysql.php"); }

  // �������� ���������� ��������
  require_once("utils/bottom.php");
?>