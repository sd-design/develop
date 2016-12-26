<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class pager
  {
    protected function __construct()
    {
    }
    protected function get_total()
    {
      // ����� ���������� �������
    }
    protected function get_pnumber()
    {
      // ���������� ������� �� ��������
    }
    protected function get_page_link()
    {
      // ���������� ������ ����� � ������
      // �� ������� ��������
    }
    protected function get_parameters()
    {
      // �������������� ���������, �������
      // ���������� �������� �� ������
    }
    
    // �������������� ������ ������������ ���������
    public function print_page()
    {
      // ������ ��� ������������� ����������
      $return_page = "";

      // ����� GET-�������� page ���������� �����
      // ������� ��������
      $page = $_GET['page'];
      if(empty($page)) $page = 1;

      // ��������� ����� ������� � �������
      $number = (int)($this->get_total()/$this->get_pnumber());
      if((float)($this->get_total()/$this->get_pnumber()) - $number != 0)
      {
        $number++;
      }

      // ������ �� ������ ��������
      $return_page .= "<a href='$_SERVER[PHP_SELF]".
                      "?page=1{$this->get_parameters()}'>".
                      "&lt;&lt;</a> ... ";
      // ������� ������ "�����", ���� ��� �� ������ �������� 
      if($page != 1) $return_page .= " <a href='$_SERVER[PHP_SELF]".
                      "?page=".($page - 1)."{$this->get_parameters()}'>".
                      "&lt;</a> ... "; 
      
      // ������� ���������� �������� 
      if($page > $this->get_page_link() + 1) 
      { 
        for($i = $page - $this->get_page_link(); $i < $page; $i++) 
        { 
          $return_page .= "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a> "; 
        } 
      } 
      else 
      { 
        for($i = 1; $i < $page; $i++) 
        { 
          $return_page .= "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a> "; 
        } 
      } 
      // ������� ������� ������� 
      $return_page .= "$i "; 
      // ������� ��������� �������� 
      if($page + $this->get_page_link() < $number) 
      { 
        for($i = $page + 1; $i <= $page + $this->get_page_link(); $i++) 
        { 
          $return_page .= "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a> "; 
        } 
      } 
      else 
      { 
        for($i = $page + 1; $i <= $number; $i++) 
        { 
          $return_page .= "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a> "; 
        } 
      } 

      // ������� ������ "������", ���� ��� �� ��������� �������� 
      if($page != $number) $return_page .= " ... <a href='".
                           "$_SERVER[PHP_SELF]?page=".
                           ($page + 1)."{$this->get_parameters()}'>".
                           "&gt;</a>"; 
      // ������ �� ��������� ��������
      $return_page .= " ... <a href='$_SERVER[PHP_SELF]".
                      "?page=$number{$this->get_parameters()}'>".
                      "&gt;&gt;</a>";
  
      return $return_page;
    }
  }
?>