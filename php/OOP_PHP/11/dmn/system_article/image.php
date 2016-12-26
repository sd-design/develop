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
  // ������������� ����
  require_once("../utils/utils.navigation.php");
  // ���������� SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");
  // ��������� ������ ����� �������
  require_once("../utils/utils.print_page.php");

  // ������ �� SQL-��������
  $_GET['id_catalog']   = intval($_GET['id_catalog']);
  $_GET['id_position']  = intval($_GET['id_position']);
  $_GET['id_paragraph'] = intval($_GET['id_paragraph']);

  try
  {
    // ��������� ���������� �� ��������
    $query = "SELECT * FROM $tbl_catalog 
              WHERE id_catalog = $_GET[id_catalog] 
              LIMIT 1";
    $cat = mysql_query($query);
    if(!$cat) exit("������ ��� ��������� � ��������");
    $catalog = mysql_fetch_array($cat);
  
    // ��������� ���������� �� �������
    $query = "SELECT * FROM $tbl_position
              WHERE id_position = $_GET[id_position]";
    $pos = mysql_query($query);
    if(!$pos) exit("������ ��� ��������� � �������");
    $position = mysql_fetch_array($pos);
  
    $title = $titlepage = '����������������� ����� ����������� ('.$catalog['name'].' - '.$position['name'].')';
    $helppage = '����� �������������� ����������������� ����� �����������('.$catalog['name'].' - '.$position['name'].')';
  
    // �������� ��������� ��������
    require_once("../utils/top.php");
  
    // ���� ��� �� �������� ������� ������� ������ ��� ��������
    // � ��� ���������� �����������
    if($_GET['id_catalog'] != 0)
    {
      echo '<table cellspacing="0" cellspacing="0" border=0><tr>
      <tr valign="top"><td height="25"><p>';
      echo "<a class=menu href=index.php?id_parent=0>�������� �������</a>-&gt;".
               menu_navigation($_GET['id_catalog'], "", $tbl_catalog)."
            <a href=paragraph.php?id_position=$_GET[id_position]&id_catalog=$_GET[id_catalog]&page=$_GET[page]>$position[name]</a>";
      echo "</td></tr></table>";
    }
  
    // �������� �����������
    echo "<a class=menu href=imgadd.php?id_catalog=$_GET[id_catalog]&".
                            "id_position=$_GET[id_position]&".
                            "id_paragraph=$_GET[id_paragraph]>�������� �����������</a><br><br>";
  
    // ����� ������ � ������������ ���������
    $page_link = 3;
    // ����� ������� �� ��������
    $pnumber = 10;
    // ��������� ������ ������������ ���������
    $obj = new pager_mysql($tbl_paragraph_image,
                           "WHERE id_position = $_GET[id_position] AND 
                                  id_catalog=$_GET[id_catalog] AND
                                  id_paragraph = $_GET[id_paragraph]",
                           "ORDER BY pos",
                           $pnumber,
                           $page_link,
                           "&id_position=$_GET[id_position]&".
                           "id_catalog=$_GET[id_catalog]&".
                           "id_paragraph=$_GET[id_paragraph]");

    // �������� ���������� ������� ��������
    $image = $obj->get_page();

    if(!empty($image))
    {
      // ������� ��������� ������� �����������
      echo '<table width="100%" class="table" border="0" cellpadding="0" cellspacing="0">
              <tr class="header" align="center">
                <td align=center>��������</td>
                <td align=center>ALT-���</td>
                <td width=20 align=center>���.</td>
                <td width=50>��������</td>
              </tr>';
      for($i = 0; $i < count($image); $i++)
      {
        $url = "id_image={$image[$i][id_image]}&".
               "id_paragraph=$_GET[id_paragraph]&".
               "id_position=$_GET[id_position]&".
               "id_catalog=$_GET[id_catalog]&".
               "page=$_GET[page]";
        // �������� ������ ������� ��� ���
        if($image[$i]['hide'] == 'hide')
        {
          $strhide = "<a href=imgshow.php?$url>����������</a>";
          $style=" class=hiddenrow ";
        } 
        else
        {
          $strhide = "<a href=imghide.php?$url>������</a>";
          $style="";
        }
  
        $image_print = "<img src=../../".$image[$i]['small']." border=0 vspace=3>";
        if(!empty($image[$i]['big']))
        {
          if(file_exists("../../".$image[$i]['big']))
          {
            // ���������� ������ �������� �����������
            $size = @getimagesize("../../".$image[$i]['big']);
            $image_print = "<a href=# 
                               onclick=\"show_img('../../{$image[$i][big]}',".$size[0].",".$size[1]."); return false \" >
                               <img src=../../".$image[$i]['small']." border=0 vspace=3></a>";
          }
        }
        
        echo "<tr $style>
              <td><p align=center>$image_print<br>
              ".print_page($image[$i]['name'])."&nbsp;</td>
              <td><p align=center>".print_page($image[$i]['alt'])."&nbsp;</td>
              <td><p>".$image[$i]['pos']."</td>
              <td><p>
                <a href=imgup.php?$url>�����</a><br>
                $strhide<br>
                <a href=# onClick=\"delete_image('imgdel.php?$url');\">�������</a><br>
                <a href=imgdown.php?$url>����</a><br>
              </td>
            </tr>";
      }
      echo "</table>";
    }
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }

  // �������� ���������� ��������
  require_once("../utils/bottom.php");
?>
<script language='JavaScript1.1' type='text/javascript'>
<!--
  function show_img(img,width,height,adm)
  {
    var a;
    var b;
    var url;
    vidWindowWidth=width;
    vidWindowHeight=height;
    a=(screen.height-vidWindowHeight)/5;
    b=(screen.width-vidWindowWidth)/2;
    features = "top=" + a + ",left=" + b + ",width=" + 
                vidWindowWidth + ",height=" + 
                vidWindowHeight + 
                ",toolbar=no,menubar=no,location=no,directories=no,scrollbars=no,resizable=no";
    url="show.php?img=" + img;
    if (adm=='true') url = "../" + url;
    window.open(url,'',features,true);
  }
  function delete_image(url)
  {
    if(confirm("�� ������������� ������ ������� �����������?"))
    {
      location.href=url;
    }
    return false;
  }
//-->
</script>