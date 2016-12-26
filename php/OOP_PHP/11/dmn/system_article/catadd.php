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
  $button_name = "��������";
  $class_name = "field";

  if(empty($_POST)) $_REQUEST['hide'] = true;
  $name = new field_text("name",
                         "��������",
                         true,
                         $_POST['name']);
  $description = new field_textarea("description",
                               "��������",
                               false,
                               $_POST['description']);
  $keywords = new field_text("keywords",
                             "�������� �����",
                             false,
                             $_POST['keywords']);
  $modrewrite = new field_text_english("modrewrite",
                             "��������&nbsp;���<br>ReWrite",
                             false,
                             $_POST['modrewrite']);
  $hide = new field_checkbox("hide",
                             "����������",
                             $_REQUEST['hide']);
  $id_parent = new field_hidden_int("id_parent",
                               true,
                               $_REQUEST['id_parent']);
  $page = new field_hidden_int("page",
                               false,
                               $_REQUEST['page']);
  try
  {
    // �����
    $form = new form(array("name" => $name,
                            "description" => $description, 
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
        $query = "SELECT MAX(pos) FROM $tbl_catalog
                  WHERE id_parent = {$form->fields[id_parent]->value}";
        $pos = mysql_query($query);
        if(!$pos)
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ��� ���������� 
                                   ������� �������");
        }
        $position = mysql_result($pos, 0) + 1;
        // ������� ��� �������� �������
        if($form->fields['hide']->value) $showhide = "show";
        else $showhide = "hide";
        // ��������� SQL-������ �� ���������� ��������
        $query = "INSERT INTO $tbl_catalog
                  VALUES (NULL,
                          '{$form->fields[name]->value}',
                          '{$form->fields[description]->value}',
                          '{$form->fields[keywords]->value}',
                          '{$form->fields[modrewrite]->value}',
                           $position,
                          '$showhide',
                          {$form->fields[id_parent]->value})";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ��� ���������� ������ 
                                   ��������");
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
  $title     = '���������� ����������';
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