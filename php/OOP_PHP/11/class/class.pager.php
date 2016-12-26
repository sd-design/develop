<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  abstract class pager
  {
    abstract function get_total();
    abstract function get_pnumber();
    abstract function get_page_link();
    abstract function get_parameters();
    
    // ������ �� ������ ��������
    public function __toString()
    {
      // ������ ��� ������������� ����������
      $return_page = "";

      // ����� GET-�������� page ��������� �����
      // ������� ��������
      $page = intval($_GET['page']);
      if(empty($page)) $page = 1;

      // ��������� ����� ������� � �������
      $number = (int)($this->get_total()/$this->get_pnumber());
      if((float)($this->get_total()/$this->get_pnumber()) - $number != 0)
      {
        $number++;
      }
      // ��������� ���� �� ������ �����
      if($page - $this->get_page_link() > 1)
      {
        $return_page .= "<a href=$_SERVER[PHP_SELF]".
              "?page=1{$this->get_parameters()}> 
              [1-{$this->get_pnumber()}]
              </a>&nbsp;&nbsp;...&nbsp;&nbsp;";
        // ����
        for($i = $page - $this->get_page_link(); $i<$page; $i++)
        {
          $return_page .= "&nbsp;<a href=$_SERVER[PHP_SELF]".
                 "?page=$i{$this->get_parameters()}>
                  [".(($i - 1)*$this->get_pnumber() + 1).
                  "-".$i*$this->get_pnumber()."]
                  </a>&nbsp;";
        }
      }
      else
      {
        // ���
        for($i = 1; $i<$page; $i++)
        {
          $return_page .= "&nbsp;<a href=$_SERVER[PHP_SELF]".
                 "?page=$i{$this->get_parameters()}> 
                 [".(($i - 1)*$this->get_pnumber() + 1).
                 "-".$i*$this->get_pnumber()."]
                  </a>&nbsp;";
        }
      }
      // ��������� ���� �� ������ ������
      if($page + $this->get_page_link() < $number)
      {
        // ����
        for($i = $page; $i<=$page + $this->get_page_link(); $i++)
        {
          if($page == $i)
            $return_page .= "&nbsp;[".
                (($i - 1) * $this->get_pnumber() + 1).
                 "-".$i*$this->get_pnumber()."]&nbsp;";
          else
            $return_page .= "&nbsp;<a href=$_SERVER[PHP_SELF]".
                 "?page=$i{$this->get_parameters()}> 
                 [".(($i - 1)*$this->get_pnumber() + 1).
                 "-".$i*$this->get_pnumber()."]
                 </a>&nbsp;";
        }
        $return_page .= "&nbsp;...&nbsp;&nbsp;".
             "<a href=$_SERVER[PHP_SELF]".
             "?page=$number{$this->get_parameters()}> 
             [".(($number - 1)*$this->get_pnumber() + 1).
             "-{$this->get_total()}]
             </a>&nbsp;";
      }
      else
      {
        // ���
        for($i = $page; $i<=$number; $i++)
        {
          if($number == $i)
          {
            if($page == $i)
              $return_page .= "&nbsp;[".
                              (($i - 1)*$this->get_pnumber() + 1).
                              "-{$this->get_total()}]&nbsp;";
            else
              $return_page .= "&nbsp;<a href=$_SERVER[PHP_SELF]".
                   "?page=$i{$this->get_parameters()}>
                   [".(($i - 1)*$this->get_pnumber() + 1).
                   "-{$this->get_total()}]
                   </a>&nbsp;";
          }
          else
          {
            if($page == $i)
              $return_page .= "&nbsp;[".
                  (($i - 1)*$this->get_pnumber() + 1).
                   "-".$i*$this->get_pnumber()."]&nbsp;";
            else
              $return_page .= "&nbsp;<a href=$_SERVER[PHP_SELF]".
                   "?page=$i{$this->get_parameters()}> 
                   [".(($i - 1)*$this->get_pnumber() + 1).
                   "-".($i*$this->get_pnumber())."]
                   </a>&nbsp;";
          }
        }
      }
      return $return_page;
    }

    // �������������� ��� ������������ ���������
    public function print_page()
    {
      // ������ ��� ������������� ����������
      $return_page = "";

      // ����� GET-�������� page ��������� �����
      // ������� ��������
      $page = intval($_GET['page']);
      if(empty($page)) $page = 1;

      // ��������� ����� ������� � �������
      $number = (int)($this->get_total()/$this->get_pnumber());
      if((float)($this->get_total()/$this->get_pnumber()) - $number != 0)
      {
        $number++;
      }

      // ������ �� ������ ��������
      $return_page .= "<a href='$_SERVER[PHP_SELF]?page=1{$this->get_parameters()}'>&lt;&lt;</a> ... ";
      // ������� ������ "�����", ���� ��� �� ������ �������� 
      if($page != 1) $return_page .= " <a href='$_SERVER[PHP_SELF]?page=".($page - 1)."{$this->get_parameters()}'>&lt;</a> ... "; 
      
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

      // ������� ������ �����, ���� ��� �� ��������� �������� 
      if($page != $number) $return_page .= " ... <a href='$_SERVER[PHP_SELF]?page=".($page + 1)."{$this->get_parameters()}'>&gt;</a>"; 
      // ������ �� ��������� ��������
      $return_page .= " ... <a href='$_SERVER[PHP_SELF]?page=$number{$this->get_parameters()}'>&gt;&gt;</a>";
  
      return $return_page;
    }
  }
?>