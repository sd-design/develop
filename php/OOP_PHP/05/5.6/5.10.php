<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("interface.first.php");
  require_once("interface.second.php");

  class fst implements first
  {
    public function first()
    {
      echo "����� fst:first()<br>";
    }
  }
  class snd implements second
  {
    public function second()
    {
      echo "����� snd:second()<br>";
    }
  }
  class cmn implements first, second
  {
    public function first()
    {
      echo "����� cmn:first()<br>";
    }
    public function second()
    {
      echo "����� cmn:second()<br>";
    }
  }
?>
