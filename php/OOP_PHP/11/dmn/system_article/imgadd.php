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

  // ������ �� SQL-��������
  $_GET['id_catalog']   = intval($_GET['id_catalog']);
  $_GET['id_position']  = intval($_GET['id_position']);
  $_GET['id_paragraph'] = intval($_GET['id_paragraph']);

  if(empty($_POST)) $_REQUEST['hide'] = true;
  $name = new field_text("name",
                         "��������",
                         false,
                         $_POST['name']);
  $alt = new field_text("alt",
                         "ALT-���",
                         false,
                         $_POST['alt']);
  $small   = new field_file("small",
                               "����� �����������",
                               true,
                               $_FILES,
                               "../../files/article/");
  $big   = new field_file("big",
                               "������� �����������",
                               false,
                               $_FILES,
                               "../../files/article/");
  $hide = new field_checkbox("hide",
                             "����������",
                             $_REQUEST['hide']);
  $id_catalog = new field_hidden_int("id_catalog",
                               true,
                               $_REQUEST['id_catalog']);
  $id_position = new field_hidden_int("id_position",
                               true,
                               $_REQUEST['id_position']);
  $id_paragraph = new field_hidden_int("id_paragraph",
                               true,
                               $_REQUEST['id_paragraph']);
  $page = new field_hidden_int("page",
                               false,
                               $_REQUEST['page']);
  try
  {
    $form = new form(array("name" => $name,
                            "alt" => $alt, 
                            "small" => $small, 
                            "big" => $big, 
                            "hide" => $hide, 
                            "id_catalog" => $id_catalog,
                            "id_position" => $id_position,
                            "id_paragraph" => $id_paragraph,
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
        $query = "SELECT MAX(pos) FROM $tbl_paragraph_image
                  WHERE id_catalog={$form->fields['id_catalog']->value} AND
                        id_position={$form->fields['id_position']->value} AND
                        id_paragraph={$form->fields['id_paragraph']->value}";
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
        // �����������
        $var = $form->fields['small']->get_filename();
        if(!empty($var)) $small = "files/article/".$var;
        else $small = "";
        $var = $form->fields['big']->get_filename();
        if(!empty($var)) $big = "files/article/".$var;
        else $big = "";
        // ��������� SQL-������ �� ���������� �������
        $query = "INSERT INTO $tbl_paragraph_image
                  VALUES (NULL,
                          '{$form->fields[name]->value}',
                          '{$form->fields[alt]->value}',
                          '$small',
                          '$big',
                          '$showhide',
                           $pos,
                          {$form->fields[id_position]->value},
                          {$form->fields[id_catalog]->value},
                          {$form->fields[id_paragraph]->value})";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ��� ���������� 
                                   �����������");
        }
        // ������������ �������� �� ������� �������� �����������������
        header("Location: image.php?".
               "id_paragraph={$form->fields[id_paragraph]->value}&".
               "id_position={$form->fields[id_position]->value}&".
               "id_catalog={$form->fields[id_catalog]->value}&".
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
  $title     = '���������� �����������';
  $pageinfo  = '<p class=help>����� ����������� ��������� ��������������� �� �������� �����. ����
                ����������� ������� �����������, �� ����� ����������� ���������� ������������, ���
                �������� �� ������� ����������� ������� �����������.</p>';
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