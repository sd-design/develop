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

  // ���������
  $button_name = "�������������";
  $class_name = "field";

  $_GET['id_catalog'] = intval($_GET['id_catalog']);
  if(empty($_POST))
  {
    try
    {
      $query = "SELECT * FROM $tbl_catalog
                WHERE id_catalog=$_GET[id_catalog]
                LIMIT 1";
      $cat = mysql_query($query);
      if(!$cat)
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                "������ ��� ��������� 
                                 ��������");
      }
      $_REQUEST = mysql_fetch_array($cat);
      $_REQUEST['page'] = $_GET['page'];
      if($_REQUEST['hide'] == 'show') $_REQUEST['hide'] = true;
      else $_REQUEST['hide'] = false;
    }
    catch(ExceptionMySQL $exc)
    {
      require("../utils/exception_mysql.php"); 
    }
  }

  $name = new field_text("name",
                         "��������",
                         true,
                         $_REQUEST['name']);
  $description = new field_textarea("description",
                               "��������",
                               false,
                               $_REQUEST['description']);
  $keywords = new field_text("keywords",
                             "�������� �����",
                             false,
                             $_REQUEST['keywords']);
  $modrewrite = new field_text_english("modrewrite",
                             "�������� ���<br>ReWrite",
                             false,
                             $_REQUEST['modrewrite']);
  $hide = new field_checkbox("hide",
                             "����������",
                             $_REQUEST['hide']);
  $id_catalog = new field_hidden_int("id_catalog",
                               true,
                               $_REQUEST['id_catalog']);
  $id_parent = new field_hidden_int("id_parent",
                               true,
                               $_REQUEST['id_parent']);
  $page = new field_hidden_int("page",
                               false,
                               $_REQUEST['page']);
  try
  {
    $form = new form(array("name" => $name,
                            "description" => $description, 
                            "keywords" => $keywords, 
                            "modrewrite" => $modrewrite, 
                            "hide" => $hide,
                            "modrewrite" => $modrewrite,
                            "id_catalog" => $id_catalog,
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
        // ������� ��� �������� �������
        if($form->fields['hide']->value) $showhide = "show";
        else $showhide = "hide";
        // ��������� SQL-������ �� ���������� ��������
        $query = "UPDATE $tbl_catalog
                  SET name        = '{$form->fields[name]->value}',
                      description = '{$form->fields[description]->value}',
                      keywords    = '{$form->fields[keywords]->value}',
                      modrewrite  = '{$form->fields[modrewrite]->value}',
                      hide        = '$showhide'
                  WHERE id_catalog = {$form->fields[id_catalog]->value}";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ��� �������������� 
                                   �����������");
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
  $title     = '�������������� �������';
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