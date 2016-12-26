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

  // ������ �� SQL-��������
  $_GET['id_catalog']   = intval($_GET['id_catalog']);
  $_GET['id_position']  = intval($_GET['id_position']);
  $_GET['id_paragraph'] = intval($_GET['id_paragraph']);
  if(empty($_POST))
  {
    try
    {
      $query = "SELECT * FROM $tbl_paragraph
                WHERE id_catalog=$_GET[id_catalog] AND
                      id_position=$_GET[id_position] AND
                      id_paragraph=$_GET[id_paragraph]
                LIMIT 1";
      $par = mysql_query($query);
      if(!$par)
      {
        throw new ExceptionMySQL(mysql_error(), 
                                 $query,
                                "������ ��� ��������� 
                                 � �������");
      }
      $_REQUEST = mysql_fetch_array($par);
      $_REQUEST['page'] = $_GET['page'];
      if($_REQUEST['hide'] == 'show') $_REQUEST['hide'] = true;
      else $_REQUEST['hide'] = false;
    }
    catch(ExceptionMySQL $exc)
    {
      require("../utils/exception_mysql.php"); 
    }
  }

  $name = new field_textarea("name",
                         "����������",
                         true,
                         $_REQUEST['name'],
                         50,
                         15);
  $type      = new field_select("type",
                                "��� ���������",
                                array("text" => "��������",
                                      "title_h1" => "��������� H1",
                                      "title_h2" => "��������� H2",
                                      "title_h3" => "��������� H3",
                                      "title_h4" => "��������� H4",
                                      "title_h5" => "��������� H5",
                                      "title_h6" => "��������� H6"),
                                $_REQUEST['type']);
  $align      = new field_select("align",
                                "��� ���������",
                                array("left" => "�����",
                                      "center" => "�� ������",
                                      "right" => "������"),
                                $_REQUEST['align']);
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
                            "type" => $type, 
                            "align" => $align, 
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
        // ������� ��� �������� �������
        if($form->fields['hide']->value) $showhide = "show";
        else $showhide = "hide";
        // ��������� SQL-������ �� �������������� �������
        $query = "UPDATE $tbl_paragraph
                  SET name = '{$form->fields['name']->value}',
                      type = '{$form->fields['type']->selected()}',
                      align = '{$form->fields['align']->selected()}',
                      hide = '$showhide'
                  WHERE id_position = {$form->fields['id_position']->value} AND
                        id_catalog = {$form->fields['id_catalog']->value} AND
                        id_paragraph = {$form->fields['id_paragraph']->value}";
        if(!mysql_query($query))
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ��� �������������� 
                                   ���������");
        }
        // ������������ �������� �� ������� �������� �����������������
        header("Location: paragraph.php?".
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
  $title     = '�������������� ���������';
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
  ?>
    <p class=help>
    ��������: <a href=# onClick="javascript:tag('[i]', '[/i]'); return false;">[i][/i]</a><br>
    ������: <a href=# onClick="javascript:tag('[b]', '[/b]'); return false;">[b][/b]</a><br>
    URL: <a href=# onClick="javascript:tag('[url]', '[/url]'); return false;" >[url][/url]</a></p>
  <?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ������� HTML-����� 
  $form->print_form();

  // �������� ���������� ��������
  require_once("../utils/bottom.php");
?>
<script language='JavaScript' type='text/javascript'>
<!--
  function tag(text1, text2)
  {
     if ((document.selection))
     {
       document.form.name.focus();
       document.form.document.selection.createRange().text = text1+document.form.document.selection.createRange().text+text2;
     } else document.form.name.value += text1+text2;
  }
//-->
</script>