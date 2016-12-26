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
  require_once("../../config/config.php");
  // ���������� ���� �����������
  require_once("../utils/security_mod.php");
  // ���������� ������ �����
  require_once("../../config/class.config.dmn.php");

  // ������ �� SQL-��������
  $_GET['id_parent'] = intval($_GET['id_parent']);
  // ���������
  $button_name = "��������";
  $class_name = "field";

  // ������� ������ hide
  if(empty($_POST)) $_REQUEST['hide'] = true;
  // ���� name ��� ����� ����� �����
  $name = new field_text("name",
                         "��������",
                         true,
                         $_POST['name']);
  // URL
  $url = new field_text("url",
                         "URL",
                         true,
                         $_POST['url']);
  // ���� ��� �������� ����
  $keywords = new field_text("keywords",
                             "�������� �����",
                             false,
                             $_POST['keywords']);
  // ���� mod_rewrite
  $modrewrite = new field_text_english("modrewrite",
                             "�������� ���<br>ReWrite",
                             false,
                             $_POST['modrewrite']);
  // ����������
  $hide = new field_checkbox("hide",
                             "����������",
                             $_REQUEST['hide']);
  // ����� ������� ���� ������� ��������� ����
  $id_parent = new field_hidden_int("id_parent",
                               true,
                               $_REQUEST['id_parent']);
  // �������� page
  $page = new field_hidden_int("page",
                               false,
                               $_REQUEST['page']);
  // �����
  try
  {
    $form = new form(array("name" => $name,
                            "url" => $url,
                            "keywords" => $keywords, 
                            "modrewrite" => $modrewrite, 
                            "hide" => $hide,
                            "modrewrite" => $modrewrite,
                            "id_parent" => $id_parent,
                            "page" => $page), 
                            $button_name,
                            $class_name);
  }
  catch(ExceptionObject $exc) 
  {
    require("../utils/exception_object.php"); 
  }

  // ���������� HTML-�����
  if(!empty($_POST))
  {
    try
    {
      // ��������� ������������ ���������� HTML-�����
      // � ������������ ��������� ����
      $error = $form->check();
      if(empty($error))
      {
        // ��������� ������� ������������ �������
        $query = "SELECT MAX(pos) FROM $tbl_position
                  WHERE id_catalog = {$form->fields[id_parent]->value}";
        $pos = mysql_query($query);
        if(!$pos)
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ��� ���������� 
                                   ������� �������");
        }
        $pos = mysql_result($pos, 0) + 1;
        // ������� ��� �������� �������
        if($form->fields['hide']->value) $showhide = "show";
        else $showhide = "hide";
        // ��������� SQL-������ �� ���������� �������
        $query = "INSERT INTO $tbl_position
                  VALUES (NULL,
                          '{$form->fields[name]->value}',
                          '{$form->fields[url]->value}',
                          '{$form->fields[keywords]->value}',
                          '{$form->fields[modrewrite]->value}',
                           $pos,
                          '$showhide',
                           {$form->fields[id_parent]->value})";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ��� ���������� 
                                   ����� �������");
        }
        // ������������ �������� �� ������� �������� �����������������
        header("Location: index.php?".
               "id_parent={$form->fields[id_parent]->value}&".
               "page={$form->fields[page]->value}");
        exit();
      }
    }
    catch(ExceptionMySQL $exc)
    {
      require("../utils/exception_mysql.php"); 
    }
  }
  // ������ ��������
  $title     = '���������� �������';
  $pageinfo  = '<p class=help></p>';
  // �������� ��������� ��������
  require_once("../utils/top.php");
  
  echo "<p><a href=# onClick='history.back()'>�����</a></p>";
  // ������� ��������� �� ������� ���� ��� �������
  if(!empty($error))
  {
    foreach($error as $err)
    {
      echo "<span style=\"color:red\">$err</span><br>";
    }
  }
  // ������� HTML-����� 
  $form->print_form();

  // �������� ���������� ��������
  require_once("../utils/bottom.php");
?>