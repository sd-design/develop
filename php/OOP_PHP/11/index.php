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
  require_once("config/config.php");
  // ���������� SoftTime FrameWork
  require_once("config/class.config.php");

  // ���������� �������� ��� ������
  define("ARTICLE", 1);

  // ���� �� ������� �������� id_position - ������� ������ ������
  if(empty($_GET['id_position']))
  {
    // ��������� GET-���������, ������������ SQL-��������
    $_GET['page']       = intval($_GET['page']);
    $_GET['id_catalog'] = intval($_GET['id_catalog']);

    // ����������� ��������� �������� �������
    $query = "SELECT * FROM $tbl_catalog 
              WHERE hide = 'show' AND 
                    id_catalog = ".$_GET['id_catalog'];
    $cat = mysql_query($query);
    if(!$cat) exit("������ ��� ���������� ���������� �������� �������");
    $catalog = mysql_fetch_array($cat);

    //���������� ������� ������
    $title = $catalog['name'];
    $keywords = $catalog['keywords'];
    require_once ("templates/top.php");

    // ��������
    ?>
      <!-- s rightpanel -->
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" bgcolor="#82A6DE" class="rightpanel_ttl">
          <img src="dataimg/dot_ttl.gif" align="absmiddle">
          <?php echo htmlspecialchars($title); ?>
        </td>
      </tr>
      <tr>
        <td height="3" nowrap bgcolor="#004BBC"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    <?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
    // ����������� ���������� �������� �������
    $query = "SELECT * FROM $tbl_catalog
              WHERE hide = 'show' AND id_parent = $_GET[id_catalog]
              ORDER BY pos";
    $sub = mysql_query($query);
    if (!$sub) exit("������ ��� ��������� � ����� ������");
    if(mysql_num_rows($sub))
    {
      echo "<tr><td class=\"main_txt\">";
      while($subcatalog = mysql_fetch_array($sub))
      {
        echo "<h4><a href=\"".$_SERVER['PHP_SELF']."?id_catalog=".$subcatalog['id_catalog']."\" 
                     class=\"menu_lnk\">".
                     htmlspecialchars($subcatalog['name'])."</a>
              </h4>";
      }
      echo "</td></tr>";
    }

    // ����������� ������ �������� �������
    $query = "SELECT * FROM $tbl_position
              WHERE hide = 'show' AND id_catalog = ".$_GET['id_catalog']."
              ORDER BY pos";
    $pos = mysql_query($query);
    if (!$pos) exit("������ ��� ��������� � ����� ������");
    if(mysql_num_rows($pos) > 0)
    {
      // ������� ���� � ����������� ���
      if(mysql_num_rows($pos) == 1 && !mysql_num_rows($sub))
      {
        // �������� ��������� ������� ������
        $position = mysql_fetch_array($pos);
        // ���� ������ �� ����� ���� �������� ������� - ������������ ��������
        if($position['url'] != 'article')
        {
          echo "<HTML><HEAD>
                <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$position[url]'>
                </HEAD></HTML>";
          exit();
        }
        // ������ ���� � ��� ����������� - ������� ���������� ������
        $_GET['id_position'] = $position['id_position'];
        require_once("article_print.php");
      }
      // ������ ��������� ��� ������� ����� ����������
      else
      {
        echo "<tr><td class=\"main_txt\">";
        while($position = mysql_fetch_array($pos))
        {
          if($position['url'] != 'article')
          {
            echo "<a href=\"".htmlspecialchars($position['url'])."\" 
                     class=\"rightpanel_lnk\">
                   ".htmlspecialchars($position['name'])."</a><br>";
          }
          else
          {
            echo "<a href=\"$_SERVER[PHP_SELF]?id_catalog=$_GET[id_catalog]&".
                 "id_position=$position[id_position]\" 
                  class=\"rightpanel_lnk\">".htmlspecialchars($position['name'])."</a><br>";
          }
        }
        echo "</td></tr>";
      }
    }
    echo "</table>";
  }
  else
  {
    // ��������� GET-���������, ������������ SQL-��������
    $_GET['id_position'] = intval($_GET['id_position']);
    // �������� ��������� ������� ������
    $query = "SELECT * FROM $tbl_position
              WHERE hide = 'show' AND 
                    id_position = $_GET[id_position]";
    $pos = mysql_query($query);
    if (!$pos) exit("������ ��� ��������� � ����� ������");
    $position = mysql_fetch_array($pos);
    // ���� ������ �� ����� ���� �������� ������� - ������������ ��������
    if($position['url'] != 'article')
    {
      echo "<HTML><HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$position[url]'>
            </HEAD></HTML>";
      exit();
    }
    //���������� ������� ������
    $title = $position['name'];
    $_GET['id_catalog'] = $position['id_catalog'];
    $keywords = $position['keywords'];
    require_once ("templates/top.php");

    // ��������
    ?>
      <!-- s rightpanel -->
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" bgcolor="#82A6DE" class="rightpanel_ttl">
          <img src="dataimg/dot_ttl.gif" align="absmiddle">
          <?php echo htmlspecialchars($title); ?>
        </td>
      </tr>
      <tr>
        <td height="3" nowrap bgcolor="#004BBC"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    <?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
    // ������� ������
    require_once("article_print.php");

    echo "</table>";
  }
  //���������� ������ ������
  require_once ("templates/bottom.php");
?>