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
  // ������ ��������� � ���� MySQL
  ////////////////////////////////////////////////////////////

  class ExceptionMySQL extends Exception
  {
    // ��������� �� ������
    protected $mysql_error;
    // SQL-������
    protected $sql_query;

    public function __construct($mysql_error, $sql_query, $message)
    {
      $this->mysql_error = $mysql_error;
      $this->sql_query = $sql_query;

      // �������� ����������� �������� ������
      parent::__construct($message);
    }

    public function getMySQLError()
    {
      return $this->mysql_error;
    }
    public function getSQLQuery()
    {
      return $this->sql_query;
    }
  }
?>
