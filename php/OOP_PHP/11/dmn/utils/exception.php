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
  require_once("../utils/top.php");

  echo "<p class=help>{$exc->getMessage()}</p>";
  echo "<p class=help><a href=# onclick='history.back()'>���������</a></p>";

  // �������� ���������� ��������
  require_once("../utils/bottom.php");
  exit();
?>