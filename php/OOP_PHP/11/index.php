<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Устанавливаем соединение с базой данных
  require_once("config/config.php");
  // Подключаем SoftTime FrameWork
  require_once("config/class.config.php");

  // Определяем параметр для статей
  define("ARTICLE", 1);

  // Если не передан параметр id_position - выводим список статей
  if(empty($_GET['id_position']))
  {
    // Проверяем GET-параметры, предотвращая SQL-инъекцию
    $_GET['page']       = intval($_GET['page']);
    $_GET['id_catalog'] = intval($_GET['id_catalog']);

    // Запрашиваем параметры текущего раздела
    $query = "SELECT * FROM $tbl_catalog 
              WHERE hide = 'show' AND 
                    id_catalog = ".$_GET['id_catalog'];
    $cat = mysql_query($query);
    if(!$cat) exit("Ошибка при извлечении параметров текущего раздела");
    $catalog = mysql_fetch_array($cat);

    //Подключаем верхний шаблон
    $title = $catalog['name'];
    $keywords = $catalog['keywords'];
    require_once ("templates/top.php");

    // Название
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
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
    // Запрашиваем подразделы текущего раздела
    $query = "SELECT * FROM $tbl_catalog
              WHERE hide = 'show' AND id_parent = $_GET[id_catalog]
              ORDER BY pos";
    $sub = mysql_query($query);
    if (!$sub) exit("Ошибка при обращении к блоку статей");
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

    // Запрашиваем статьи текущего раздела
    $query = "SELECT * FROM $tbl_position
              WHERE hide = 'show' AND id_catalog = ".$_GET['id_catalog']."
              ORDER BY pos";
    $pos = mysql_query($query);
    if (!$pos) exit("Ошибка при обращении к блоку статей");
    if(mysql_num_rows($pos) > 0)
    {
      // Статься одна и подразделов нет
      if(mysql_num_rows($pos) == 1 && !mysql_num_rows($sub))
      {
        // Получаем параметры текущей статьи
        $position = mysql_fetch_array($pos);
        // Если статья на самом деле является ссылкой - осуществляем редирект
        if($position['url'] != 'article')
        {
          echo "<HTML><HEAD>
                <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$position[url]'>
                </HEAD></HTML>";
          exit();
        }
        // Статья одна и нет подразделов - выводим содержимое статьи
        $_GET['id_position'] = $position['id_position'];
        require_once("article_print.php");
      }
      // Статей несколько или имеются также подразделы
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
    // Проверяем GET-параметры, предотвращая SQL-инъекцию
    $_GET['id_position'] = intval($_GET['id_position']);
    // Получаем параметры текущей статьи
    $query = "SELECT * FROM $tbl_position
              WHERE hide = 'show' AND 
                    id_position = $_GET[id_position]";
    $pos = mysql_query($query);
    if (!$pos) exit("Ошибка при обращении к блоку статей");
    $position = mysql_fetch_array($pos);
    // Если статья на самом деле является ссылкой - осуществляем редирект
    if($position['url'] != 'article')
    {
      echo "<HTML><HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$position[url]'>
            </HEAD></HTML>";
      exit();
    }
    //Подключаем верхний шаблон
    $title = $position['name'];
    $_GET['id_catalog'] = $position['id_catalog'];
    $keywords = $position['keywords'];
    require_once ("templates/top.php");

    // Название
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
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
    // Выводим статью
    require_once("article_print.php");

    echo "</table>";
  }
  //Подключаем нижний шаблон
  require_once ("templates/bottom.php");
?>