<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
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
      echo "<a class=menu 
               href=urladd.php?id_parent=$_GET[id_parent]&page=$_GET[page] 
               title=\"�������� ������ �� �������� �������� ��� ������ ����� �����\">
               �������� ������
             </a>&nbsp;&nbsp;&nbsp;
            <a class=menu 
               href=artadd.php?id_parent=$_GET[id_parent]&page=$_GET[page] 
               title=\"�������� ������ � ������ ������\">
               �������� ������</a>";
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
  try
  {
    // ����� ������ � ������������ ���������
    $page_link = 3;
    // ����� ������� �� ��������
    $pnumber = 10;
    // ��������� ������ ������������ ���������
    $obj = new pager_mysql($tbl_position,
                           "WHERE id_catalog=$_GET[id_parent]",
                           "ORDER BY pos",
                           $pnumber,
                           $page_link,
                           "&id_parent=$_GET[id_parent]");

    // �������� ���������� ������� ��������
    $position = $obj->get_page();
    // ���� ������� ���� �� ���� ������ - �������
    if(!empty($position))
    {
      // ������� ��������� �������
      echo '<table width="100%" 
                   class="table" 
                   border="0" 
                   cellpadding="0" 
                   cellspacing="0">
              <tr class="header" align="center">
                <td align=center>��������</td>
                <td align=center>URL</td>
                <td width=20 align=center>���.</td>
                <td width=50>��������</td>
              </tr>';
      for($i = 0; $i < count($position); $i++)
      {
        $url = "id_position={$position[$i][id_position]}&".
               "id_catalog=$_GET[id_parent]&page=$_GET[page]";
        // �������� ������ ������� ��� ���
        if($position[$i]['hide'] == 'hide')
        {
          $strhide = "<a href=urlshow.php?$url>����������</a>";
          $style = " class=hiddenrow ";
        }
        else
        {
          $strhide = "<a href=urlhide.php?$url>������</a>";
          $style = "";
        }
        // �������� �������� �� ������� ������� ��� �������
        if($position[$i]['url'] == 'article')
        {
          $edit = "artedit.php";
          // $url ������ ������������ ��-�� ��������� page
          $name  = "<td>
                      <p class=small>
                        <a href=paragraph.php?".
                          "id_position={$position[$i][id_position]}&".
                          "id_catalog=$_GET[id_parent]>".
                          print_page($position[$i]['name'])."</a>
                      </p>
                    </td>";
        }
        else
        {
          $edit = "urledit.php";
          $name  = "<td><p class=small>".
                      print_page($position[$i]['name']).
                   "</p></td>";
        }

        // ������� �������
        echo "<tr $style>
                $name
                <td><p class=small>".print_page($position[$i]['url'])."</td>
                <td align=center><p class=small>".
                   print_page($position[$i]['pos']).
                "</p></td>
                <td>
                  <p class=small><a href=urlup.php?$url>�����</a><br>
                  $strhide<br>
                  <a href=$edit?$url>�������������</a><br>
                  <a href=# onClick=\"delete_position('urldel.php?$url');\">�������</a><br>
                  <a href=urldown.php?$url>����</a></p>
                </td>
             </tr>";
       }
      echo "</table><br>";
    }
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
?>
<script language='JavaScript1.1' type='text/javascript'>
<!--
  function delete_position(url)
  {
    if(confirm("�� ������������� ������ ������� �������?"))
    {
      location.href=url;
    }
    return false;
  }
//-->
</script>