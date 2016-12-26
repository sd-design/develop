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

  class user
  {
    // �����������
    public function __construct($name, $password)
    {
      $this->name     = $name;
      $this->password = $password;
      $this->referrer = $_SERVER['PHP_SELF'];
      $this->time     = time();
    }
    // ������ � �������� ������
    public function __get($value)
    {
      if(isset($this->$value)) return $this->$value;
      else return false;
    }
    // �������������� ������� ����� ������������
    public function __sleep()
    {
      // ���������� ����������� �������
      $name     = mysql_real_escape_string($this->name);
      $referrer = mysql_real_escape_string($this->referrer);

      // �������� ���� � �������
      $password = "";

      // ����������� ���� � ������� MySQL
      $time = date("Y-m-d H:i:s", $this->time);

      // ��������� � ��������� SQL-������
      $query = "INSERT INTO object_user 
                VALUES (NULL, 
                       '$name', 
                       '$password', 
                       '$referrer', 
                       '$time')";
      if(!mysql_query($query))
      {
        // � ������ ������� ���������� ������ �� ��������� false
        return array(false);
      }
      else
      {
        // � ������ ������ ���������� �������� ���������� �����,
        // ������������� ������������ ������ �����������
        // ��������� AUTO_INCREMENT
        $id = mysql_insert_id();
        return array("$id"); // O:4:"user":1:{s:2:"$id";N;}
      }
    }
    // ����������� ����� ��������� ����������� �����������;
    // ������������ ���������� ����� ������� � ���� ������
    public static function serialize($ser)
    {
      preg_match("|\"([\d]+)\"|", $ser, $out);
      return $out[1];
    }
    // ����������� ����� �������������� ������� �� ���� ������
    public static function unserialize($id_user)
    {
      // �������� �������� � ������ �����, ������������
      // SQL-��������
      $id_user = intval($id_user);

      // ��������� � ��������� ������ �� ��������� ������
      // � ��������
      $query = "SELECT * FROM object_user 
                WHERE id_user = $id_user";
      $obj = mysql_query($query);
      // ��� ������������� ������ ���������� false,
      // ��� ������������� � ��������� �������������� �������
      if(!$obj) return false;
      // ���� � ������� ��� �� ����� ������, ����� ����������
      // false
      if(!mysql_num_rows($obj)) return false;
      $object = mysql_fetch_array($obj);
      // ��������� � ���������� ������
      return new user($object['name'], $object['pass']);
    }

    // ��� ������������
    private $name;
    // ��� ������
    private $password;
    // ��������� ���������� ��������
    private $referrer;
    // ����� ����������� ������������
    private $time;
  }
?>
