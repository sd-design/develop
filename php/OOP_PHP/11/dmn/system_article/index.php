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
  // ������������� ����
  require_once("../utils/utils.navigation.php");
  // ���������� ���� ����������� ������ � ���� ��������
  require_once("../utils/utils.print_page.php");

  $title = $titlepage = '����������������� ����������� �����';  
  $pageinfo = '<p class=help>����� �������������� ����������������� 
                             �������� �����, ���������� ����� ����������� �
                             �� ���������</p>';

  // �������� ��������� ��������
  require_once("../utils/top.php");

  $_GET['id_parent'] = intval($_GET['id_parent']);

  // ���� ��� �� �������� ������� ������� ������ ��� ��������
  // � ��� ���������� �����������
  echo '<table cellspacing="0" cellspacing="0" border=0>
  <tr valign="top"><td height="25"><p>';
  echo "<a class=menu href=index.php?id_parent=0>�������� ����</a>-&gt;".
           menu_navigation($_GET['id_parent'], "", $tbl_catalog).
       "<a class=menu href=catadd.php?id_catalog=$_GET[id_parent]&id_parent=$_GET[id_parent]>�������� ����</a>";
  echo "</td></tr></table>";

  // ������� ������ ���������
  $query = "SELECT * FROM $tbl_catalog
            WHERE id_parent=$_GET[id_parent]
            ORDER BY pos";
    
  $ctg = mysql_query($query);
  if(!$ctg) exit("������ ��� ��������� � ��������");
  if(mysql_num_rows($ctg)>0)
  {
    // ������� ��������� ������� ���������
    echo '<table width="100%" class="table" border="0" cellpadding="0" cellspacing="0">
              <tr class="header" align="center">
                <td align=center>��������</td>
                <td align=center>��������</td>
                <td width=20 align=center>���.</td>
                <td width=50 align=center>��������</td>
              </tr>';
    while($catalog = mysql_fetch_array($ctg))
    {
      $url = "id_catalog=$catalog[id_catalog]&id_parent=$catalog[id_parent]";
      // �������� ����� ������� ��� ���
      if($catalog['hide'] == 'hide') {
        $strhide = "<a href=catshow.php?$url>����������</a>";
        $style=" class=hiddenrow ";
      } 
      else
      {
        $strhide = "<a href=cathide.php?$url>������</a>";
        $style="";
      }
      
      // ������� ������ ���������
      echo "<tr $style >
            <td><p><a href=index.php?id_parent=$catalog[id_catalog]>$catalog[name]</a></td>
            <td><p>".nl2br(print_page($catalog['description']))."&nbsp;</td>
            <td><p align=center>$catalog[pos]</td>
            <td><p>
            <a href=catup.php?$url>�����</a><br>
            $strhide<br>
            <a href=catedit.php?$url>�������������</a><br>
            <a href=# onClick=\"delete_catalog('catdel.php?$url');\">�������</a><br>
            <a href=catdown.php?$url>����</a><br></td>
          </tr>";
    }
    echo "</table>";
  }

  // ������� ������� �������� �������
  if(isset($_GET['id_parent']) && $_GET['id_parent'] != 0)
  {
    // ������� ������� �������� ��������
    include "position.php";
  }

  // �������� ���������� ��������
  require_once("../utils/bottom.php");
?>
<script language='JavaScript1.1' type='text/javascript'>
<!--
  function delete_catalog(url)
  {
    if(confirm("�� ������������� ������ ������� ������?"))
    {
      location.href=url;
    }
    return false;
  }
//-->
</script>