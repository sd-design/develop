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

  class shop
  {
    public static $lock = false;

    // ����� ���������������� ���������
    private function error_print($str)
    {
      // ����������� �������
      shop::$lock = false;
      // ������� ��������������� ���������
      echo $str;
    }

    public function buy($id_user, $buy_count)
    {
      // ����������� �������� � ����� �����
      $id_user = intval($id_user);
      // ���������, �� ������ �� ���� ������ ������
      // �����������
      $count = 0;
      while(shop::$lock)
      {
        // ���������������� ������ ���������
        // �� 1 �������
        sleep(1);
        $count++;
        // ����� 30 ������� �������� �����
        if($count > 30) return false;
      }

      // ���� ������ �������� - �������� ��
      shop::$lock = true;

      // ������������ �������� ����������

      // 1. ����������� ���������� ������ �� ������
      $query = "SELECT * FROM warehouse 
                WHERE id_position = 1";
      $tot = mysql_query($query);
      if(!$tot)
      {
        // ������� ��������������� ���������
        $this->error_print("������ ������� � ��������� �������");
        // �������� �����
        return false;
      }
      list($id_position,$total,$price) = mysql_fetch_array($tot);
      // ���� ������ �� ������ ���� ��� ������,
      // ���������� ������������� ������
      if($total <= 0)
      {
        $this->error_print("����������� ������ �� ������");
        return false;
      }

      // 2. ��������� �������� �������� ������� � �������, 
      // ������ �� �� ��� ������ ������
      $query = "SELECT money FROM users WHERE id_user = $id_user";
      $mon = mysql_query($query);
      if(!$mon) 
      {
        $this->error_print("������ ������� � ����� ������������");
        return false;
      }
      if(mysql_num_rows($mon)) $money = mysql_result($mon,0);
      // ���� �����, ��������� ��� ������� $buy_count
      // ������� ������, ��� ����� �� �����
      // ������������ $money, - �������� �����
      if($buy_count*$price > $money)
      {
        $this->error_print("�� ���������� ������� ��� �������");
        return false;
      }

      // 3. ��������� ���������� ������� 
      // �� ������ �� $buy_count
      $query = "UPDATE warehouse 
                SET total = total - $buy_count 
                WHERE id_position = 1";
      mysql_query($query);

      // 4-5. ����������� ���������� ���������� �������� 
      // ������� �� $buy_count � ��������� ��������
      // �������� �� ����� ���������
      $query = "UPDATE users
                SET total = total + $buy_count,
                    money = money - ".($buy_count*$price)."
                WHERE id_user = $id_user";
      mysql_query($query);

      // 6. ��������� �������� �������� �� ���� ��������
      $query = "UPDATE bill
                SET total = total + ".($buy_count*$price);
      mysql_query($query);

      // ����������� �������
      shop::$lock = false;
      // ���������� �������� true, ��������������� ��
      // �������� ���������� ����������
      return true;
    }
  }
?>
