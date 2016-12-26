<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  try
  {
    // ���������� ��� ����������� ������
    require_once("config/class.config.php");
  
    // ��������� �����
    $button_name = "��������";
    $class_name = "field";
  
    // ���� ��� ������ ��������� � HTML-�����
    // ��������� ���������� �� ������� users
    if(empty($_POST))
    {
      $_GET['id_user'] = intval($_GET['id_user']);

      // ������������� ���������� � ����� ������
      require_once("config.php");

      $query = "SELECT * FROM users 
                WHERE id_user = $_GET[id_user]";
      $usr = mysql_query($query);
      if(!$usr)
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                 "������ ���������� ������ ������������");
      }
      $_REQUEST = mysql_fetch_array($usr);
      $_REQUEST['pass_again'] = $_REQUEST['pass'];
    }
  
    //////////////////////////////////////////
    // 1. ������������ HTML-�����
    //////////////////////////////////////////
    $pass = new field_password("pass",
                           "������",
                            true,
                            $_REQUEST['pass']);
    $pass_again = new field_password("pass_again",
                           "������ ������",
                            true,
                            $_REQUEST['pass_again']);
    $email = new field_text_email("email",
                           "E-mail",
                            true,
                            $_REQUEST['email']);
    $description = new field_textarea("description",
                           "� ����",
                            false, // ���� �� ������������
                            $_REQUEST['description']);
    $id_user = new field_hidden_int("id_user",
                                    true,
                                    $_REQUEST['id_user']);
    try
    {
      $form = new form(array("pass"        => $pass,
                             "pass_again"  => $pass_again,
                             "email"       => $email,
                             "description" => $description,
                             "id_user"     => $id_user),
                       $button_name,
                       $class_name);
    }
    catch(ExceptionObject $exc) { require("exception_object.php"); }
  
    //////////////////////////////////////////
    // 2. ���������� HTML-�����
    //////////////////////////////////////////
    if(!empty($_POST))
    {
      try
      {
        // ������������� ���������� � ����� ������
        require_once("config.php");
        // ��������� ������������ ���������� HTML-�����
        // � ������������ ��������� ����
        $error = $form->check();
  
        // ��������� ����� �� ������
        if($form->fields['pass']->value != 
           $form->fields['pass_again']->value)
        {
          $error[] = "������ �� �����";
        }
        // ��������� �� ��������������� �� ����� ������������
        // � ������������� ����������� �������
        $query = "SELECT COUNT(*) FROM users
                  WHERE email = '{$form->fields[email]->value}'";
        $mal = mysql_query($query);
        if(!$mal)
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                   "������ ���������� 
                                    ���������������� ������");
        }
        if(mysql_result($mal, 0))
        {
          $error[] = "������������ � ����������� �������
                     {$form->fields[email]->value} ���
                     ���������������";
        }
  
        if(empty($error))
        {
          // ��������� ������ ������������
          $query = "UPDATE users 
                    SET pass = MD5('{$form->fields[pass]->value}'),
                        email = '{$form->fields[email]->value}',
                        description = '{$form->fields[description]->value}'
                    WHERE id_user = {$form->fields[id_user]->value}";
          if(!mysql_query($query))
          {
            throw new ExceptionMySQL(mysql_error(), 
                                     $query,
                                     "������ ���������� 
                                      ���������������� ������");
          }
  
          // ����������� ��������, ��� ������ POST-������
          header("Location: list.php");
  
          exit();
        }
      }
      catch(ExceptionMember $exc) { require("exception_member.php"); }
    }
  }
  catch(ExceptionMySQL $exc) { require("exception_mysql.php"); }

  //////////////////////////////////////////
  // 3. ������� ����� ��������
  //////////////////////////////////////////
  // �������� ��������� ��������
  require_once("utils/top.php");
  
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
  require_once("utils/bottom.php");
?>
