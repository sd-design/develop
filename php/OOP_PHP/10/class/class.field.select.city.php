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
  // ���������� ������ select � ��������
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ (http://www.softtime.ru/info/articlephp.php?id_article=23)
  Error_Reporting(E_ALL & ~E_NOTICE);

  class field_city extends field_select
  {
    protected $alternative;
    // ����������� ������
    function __construct($name, 
                   $caption, 
                   $value,
                   $multi = false,
                   $select_size = 4,
                   $parameters = "", 
                   $help = "",
                   $help_url = "",
                   $pos = 0,
                   $id_form = 0)
    {
      // �������� ����������� �������� ������ field ��� 
      // ������������� ��� ������
      field_select::__construct($name, 
                   $caption, 
                   $options,
                   $value,
                   $multi,
                   $select_size,
                   $parameters, 
                   $help,
                   $help_url,
                   $pos,
                   $id_form);
      // �������� ���
      $this->type = 'city';
      // ����� �������������� �����, ���� �� ����� ����� �������� $parameters
      $this->alternative = $parameters;
      // ��������� ������ $options
      if($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "www.ru")
      {
        if(!is_array($this->value)) $this->value = preg_split('#\\\r\\\n#',$this->value);
      }
      else
      {
        if(!is_array($this->value)) $this->value = preg_split('#\r\n#',$this->value);
      }
    }

    // �����, ��� �������� ����� �������� ����
    // � ������ ���� �������� ����������
    function get_html()
    {
      global $cities;

      // ���� �������� ���������� �� ����� - ��������� ��
      if(!empty($this->css_style)) $style = "style=\"".$this->css_style."\"";
      else $style = "";
      if(!empty($this->css_class)) $class = "class=\"".$this->css_class."\"";
      else $class = "";

      if($this->multi && $this->select_size) $multi = "multiple size=".$this->select_size;
      else $multi = "";

      // ��������� �� ����� �� ������������ �������������� �����
      if(!empty($this->alternative) && empty($this->value))
      {
        // ��������� ��� �� ������ ������ � ���� ������
        if (!get_magic_quotes_gpc()) $this->alternative = mysql_escape_string($this->alternative);

        $query = "SELECT * FROM $cities WHERE name = '".$this->alternative."'";
        $cit = mysql_query($query);
        if(mysql_num_rows($cit))
        {
          // ����� ����� ��� ������� � ���� ������,
          // ������� ������ $this->value �������� ���������� �����
          $id = mysql_fetch_array($cit);
          $this->value = $id['id_city'];
        }
      }
      // ��������� ���� ����� ��� ��������������� ������
      $alternative = "<input $style $class
                       type=\"".$this->type."\" 
                       name=\"".$this->name."\" 
                       value=\"".htmlspecialchars($this->alternative, ENT_QUOTES)."\"
                       $size $maxlength>\n";
      
      // ��������� ���
      $tag = "<select $style $class name=\"".$this->name."\" $multi>\n";
      // ��������� ������ �� ���� ������
      $query = "SELECT * FROM $cities ORDER BY name";
      $cit = mysql_query($query);
      if(!$cit) exit("������ ��� ��������� � ������ �������");
      if(mysql_num_rows($cit))
      {
        $tag .= "<option value='0' $selected>������� �����</option>\n";
        while($cit_result = mysql_fetch_array($cit))
        {
          if($cit_result['id_city'] == trim($this->value)) $selected = "selected";
          else $selected = "";
          $tag .= "<option value='".htmlspecialchars($cit_result['id_city'], ENT_QUOTES)."' $selected>".htmlspecialchars($cit_result['name'], ENT_QUOTES)."</option>\n";
        }
      }
      $tag .= "</select>\n";

      // ��������� ���������, ���� ��� �������
      $help = "";
      if(!empty($this->help)) $help .= "<span style='color:blue'>".nl2br($this->help)."</span>";
      if(!empty($help)) $help .= "<br>";
      if(!empty($this->help_url)) $help .= "<span style='color:blue'><a href=".$this->help_url.">������</a></span>";

      return array($this->caption, $tag, $help, $alternative);
    }

    // �����, ����������� ������������ ���������� ������
    function check()
    {
      global $cities;
      if (!get_magic_quotes_gpc()) 
      {
        for($i = 0; $i < count($this->value); $i++)
        {
          $this->value[$i] = mysql_escape_string($this->value[$i]);
        }
      }
      // �������� ������ ��������� �������� ������
      if($this->is_required)
      {
        // ��������� ������ �� ���� ������
        $id_city = $this->selected();
        $id_city = (int)$id_city;
        $query = "SELECT COUNT(*) FROM $cities WHERE id_city=".$id_city." LIMIT 1";
        $cit = mysql_query($query);
        if(!$cit) exit("������ ��� ��������� � ������ �������".mysql_error());
        if(@mysql_result($cit, 0) <= 0) return "���� \"".$this->caption."\" �������� ������������ ��������";
      }

      return "";
    }
    // ��������� �������
    function selected()
    {
      return $this->value[0];
    }
    // �����, ������������ ����������� ���
    function get_himself_name()
    {
      return __CLASS__;
    }
  }
?>