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
  // ��������� � �������, ��������� �� field-������������
  ////////////////////////////////////////////////////////////

  class ExceptionObject extends Exception
  {
    // ��� �������
    protected $key;

    public function __construct($key, $message)
    {
      $this->key = $key;

      // �������� ����������� �������� ������
      parent::__construct($message);
    }

    public function getKey()
    {
      return $this->key;
    }
  }
?>