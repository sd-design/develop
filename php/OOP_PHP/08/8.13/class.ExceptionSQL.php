<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ������������� ���������� � ����� ������
  require_once("config.php");

  class ExceptionSQL extends Exception
  {
    // ��������� ���� ������ � ������� exception,
    // ��������������� ������� �������������� ��������
    protected $id_exception;
    // ����������� ������, ����������������
    // ����� $message � $code - ��� ���������
    // ����������� ��� ��������������
    public function __construct($message = null, $code = 0)
    {
      // �������� ����������� �������� ������
      parent::__construct($message, $code);

      // ���������� ����������� � ��������
      // �������� �������� � ������ ����
      $message = mysql_real_escape_string($this->message);
      $file    = mysql_real_escape_string($this->file);
      $trace   = mysql_real_escape_string($this->getTraceAsString());
      $code    = intval($this->code);
      $line    = intval($this->line);

      // ��������� � ��������� SQL-������ �� ����������
      // ���������� �� �������������� �������� � ���� ������
      $query = "INSERT INTO exception 
                VALUES (NULL, 
                       '$message',
                        $code,
                       '$file',
                        $line,
                       '$trace',
                        NOW())";
      @mysql_query($query);

      // ��������� �������� ���������� ����� id_exception,
      // ������������ ����� ������ ��� ������ AUTO_INCREMENT
      $this->id_exception = mysql_insert_id();
    }

    // ���������� �������� ���������� ����� � ������� exception 
    public function getID()
    {
      return $this->id_exception;
    }
  }
?>
