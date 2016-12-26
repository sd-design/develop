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
  // ��������� ������ ����� �������
  require_once("../utils/utils.print_page.php");

  // ������ �� SQL-��������
  $_GET['id_position'] = intval($_GET['id_position']);
  $_GET['id_catalog']  = intval($_GET['id_catalog']);

  try
  {
    // ��������� ���������� �� ��������
    $query = "SELECT * FROM $tbl_catalog
              WHERE id_catalog = $_GET[id_catalog] 
              LIMIT 1";
    $cat = mysql_query($query);
    if(!$cat)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ��������� 
                               � ��������");
    }
    $catalog = mysql_fetch_array($cat);
  
    // ��������� ���������� �� �������
    $query = "SELECT * FROM $tbl_position
              WHERE id_position = $_GET[id_position]";
    $pos = mysql_query($query);
    if(!$pos)
    {
      throw new ExceptionMySQL(mysql_error(), 
                               $query,
                              "������ ��� ��������� 
                               � �������");
    }
    $position = mysql_fetch_array($pos);
  
    $title = $titlepage = '������� ('.$catalog['name'].
                          ' - '.$position['name'].')';
    $pageinfo = '<p class=help>����� �������������� 
                 ����������������� ������� ('.$catalog['name'].
                 ' - '.$position['name'].'). 
                 �������� ����� ������������ ����� ��� ������� 
                 ��������� �����, ��� � ���������. �������� 
                 ������������� ����� ����������
                 (H1, H2, H3, H4, H5, H6), H1 - ����� ������� 
                 ���������, ����������� ������ ��� �������� 
                 �������, ����� ��������� ����������� � 
                 �������, �.�. H6 - ��� ����� ������ ���������.</p>';


    // ����� ������ � ������������ ���������
    $page_link = 3;
    // ����� ������� �� ��������
    $pnumber = 10;
    // ��������� ������ ������������ ���������
    $obj = new pager_mysql($tbl_paragraph,
                           "WHERE id_position = $_GET[id_position] AND 
                                  id_catalog=$_GET[id_catalog]",
                           "ORDER BY pos",
                           $pnumber,
                           $page_link,
                           "&id_position=$_GET[id_position]&".
                           "id_catalog=$_GET[id_catalog]");

    // �������� ���������� ������� ��������
    $paragraph = $obj->get_page();

    // �������� ��������� ��������
    require_once("../utils/top.php");

    // ���� ��� �� �������� ������� ������� ������ ��� ��������
    // � ��� ���������� �����������
    if($_GET['id_catalog'] != 0)
    {
      echo '<table cellspacing="0" cellspacing="0" border=0><tr>
      <tr valign="top"><td height="25"><p>';
      echo "<a class=menu href=index.php?id_parent=0>
               �������� �������</a>-&gt;".
               menu_navigation($_GET['id_catalog'], 
                               "", 
                               $tbl_catalog).$position['name'];
      echo "</td></tr></table>";
    }

    // �������� ��������
    echo "<form action=paradd.php>";
    echo "<input class=button type=submit value='�������� ��������'><br><br>";
    echo "<input type=hidden name=page value='$_GET[page]'><br><br>";
  
    if(!empty($paragraph))
    {
      // ������� ��������� ������� ���������
      echo "<input type=hidden 
                   name=id_catalog 
                   value=$_GET[id_catalog]>";
      echo "<input type=hidden 
                   name=id_position 
                   value=$_GET[id_position]>";
      echo '<table width="100%" 
                   class="table" 
                   border="0" 
                   cellpadding="0" 
                   cellspacing="0">
              <tr class="header" align="center">
                <td width=20 align=center>
                   <input type=radio name=pos value=-1 checked></td>
                <td align=center>����������</td>
                <td width=100 align=center>�����������<br> � �����</td>
                <td width=100 align=center>���</td>
                <td width=20 align=center>���.</td>
                <td width=50>��������</td>
              </tr>';
      for($i = 0; $i < count($paragraph); $i++)
      {
        $url = "id_paragraph={$paragraph[$i][id_paragraph]}".
               "&id_position=$_GET[id_position]&".
               "id_catalog=$_GET[id_catalog]".
               "&page=$_GET[page]";
        // �������� ��� ���������
        $type = "��������";
        switch($paragraph[$i]['type'])
        {
          case 'text':
            $type = "��������";
            break;
          case 'title_h1':
            $type = "��������� H1";
            break;
          case 'title_h2':
            $type = "��������� H2";
            break;
          case 'title_h3':
            $type = "��������� H3";
            break;
          case 'title_h4':
            $type = "��������� H4";
            break;
          case 'title_h5':
            $type = "��������� H5";
            break;
          case 'title_h6':
            $type = "��������� H6";
            break;
        }
        // �������� ��� ������������ ���������
        $align = "";
        switch($paragraph[$i]['align'])
        {
          case 'left':
            $align = "align=left";
            break;
          case 'center':
            $align = "align=center";
            break;
          case 'right':
            $align = "align=right";
            break;
        }
        // �������� ������ ������� ��� ���
        if($paragraph[$i]['hide'] == 'hide') 
        {
          $strhide = "<a href=parshow.php?$url>����������</a>";
          $style=" class=hiddenrow ";
        } 
        else
        {
          $strhide = "<a href=parhide.php?$url>������</a>";
          $style="";
        }
        // ��������� ������� ����������� � ������ �������
        $query = "SELECT COUNT(*) FROM $tbl_paragraph_image
                  WHERE id_paragraph = {$paragraph[$i][id_paragraph]} AND
                        id_position = $_GET[id_position] AND
                        id_catalog = $_GET[id_catalog]";
        $tot = mysql_query($query);
        if(!$tot)
        {
          throw new ExceptionMySQL(mysql_error(), 
                                   $query,
                                  "������ ��� �������� 
                                   ����� �����������");
        }
        $total_image = mysql_result($tot, 0);
        if($total_image) $print_image = " ($total_image)";
        else $print_image = "";
        
        echo "<tr $style>
              <td><p align=center>
                <input type=radio name=pos value=".$paragraph[$i]['pos'].">
              </p></td>
              <td><p $align>".print_page($paragraph[$i]['name'])."</p></td>
              <td><p align=center>
                <a href=image.php?$url>�����������$print_image</a>
              </p></td>
              <td><p align=center>".print_page($type)."</p></td>
              <td><p align=center>".$paragraph[$i]['pos']."</p></td>
              <td><p>
              <a href=parup.php?$url>�����</a><br>
              $strhide<br>
              <a href=paredit.php?$url>�������������</a><br>
              <a href=# onClick=\"delete_par('pardel.php?$url');\">�������</a><br>
              <a href=pardown.php?$url>����</a><br></td>
            </tr>";
      }
      echo "</table><br><br>";
    }
    echo "</form>";
?>
<table cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td>
      <?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
        // ������� ������ �� ������ ��������
        echo $obj;
      ?>
    </td>
  </tr>
</table><br>
<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }

  // �������� ���������� ��������
  require_once("../utils/bottom.php");
?>
<script language='JavaScript' type='text/javascript'>
<!--
  function delete_par(url)
  {
    if(confirm("�� ������������� ������ ������� ��������?"))
    {
      location.href=url;
    }
    return false;
  }
//-->
</script>