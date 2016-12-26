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
  // ���������� SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");
  // ���������� ��������� �������
  require_once("../utils/utils.password.php");

  // ���������� ����� ������
  $pass_example = generate_password(10);

  // ��������� �����
  $button_name = "��������";
  $class_name = "field";

  $name = new field_text_english("name",
                                "��� ������������",
                                true,
                                $_POST['name']);
  $pass = new field_password("pass",
                             "������",
                             true,
                             $_POST['pass'],
                             255,
                             41,
                             "",
                             "��������, $pass_example");
  $passag = new field_password("passag",
                             "������ ������",
                             true,
                             $_POST['passag'],
                             255,
                             41,
                             "",
                             "��������, $pass_example");
  $page = new field_hidden_int("page",
                               false,
                               $_REQUEST['page']);

  try
  {
    $form = new form(array("name"   => $name,
                           "pass"   => $pass,
                           "passag" => $passag,
                           "page"   => $page),
                     $button_name,
                     $class_name);
  }
  catch(ExceptionObject $exc) 
  {
    require("../utils/exception_object.php"); 
  }

  if(!empty($_POST))
  {
    try
    {
      // ��������� ������������ ���������� HTML-�����
      // � ������������ ��������� ����
      $error = $form->check();
  
      if($form->fields['pass']->value != $form->fields['passag']->value)
      {
        $error[] = "������ �� �����";
      }
      // ��������� �� ��������������� �� ����� ������������
      // � ������������� ����������� �������
      $query = "SELECT COUNT(*) FROM $tbl_accounts
              WHERE name = '{$form->fields[name]->value}'";
      $acc = mysql_query($query);
      if(!$acc)
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                 "������ ���������� ������
                                  ������������");
      }
      if(mysql_result($acc, 0))
      {
        $error[] = "������������ � ������
                   {$form->fields[name]->value} ���
                   ���������������";
      }
  
      // ���� ������ ��� ��������� ������ ������������
      if(empty($error))
      {
        $query = "INSERT INTO $tbl_accounts 
                  VALUES (NULL,
                         '{$form->fields[name]->value}',
                          MD5('{$form->fields[pass]->value}'))";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ���������� ������
                                   ������������");
        }
  
        // ����������� ��������, ��� ������ POST-������
        header("Location: index.php?page=".$form->fields['page']->value);
  
        exit();
      }
    }
    catch(ExceptionMySQL $exc)
    {
      require("../utils/exception_mysql.php"); 
    }
  }

  // �������� ��������� ��������
  $title = "���������� ��������";
  $pageinfo = '<p class=help>��� ������������ � ������ ����� ��������� 
               ������ ���������� �������</p>';
  require_once("../utils/top.php");
  
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