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

  // Если GET-параметр id_news не передан - выводим 
  // список новостных позиций
  if(empty($_GET['id_news']))
  {
    // Проверяем параметр page, предотвращая SQL-инъекцию
    $_GET['page'] = intval($_GET['page']);

    // Число позиций на странице
    $pnumber = 10;
    // Число ссылок в постраничной навигации
    $page_link = 3;
    // Объявляем объект постраничной навигации
    $obj = new pager_mysql($tbl_news,
                           "",
                           "ORDER BY putdate DESC",
                           $pnumber,
                           $page_link);

    // Подключаем верхний шаблон
    $title = "НОВОСТИ";
    $keywords = "новости";
    require_once ("templates/top.php");

    // Получаем содержимое текущей страницы
    $news = $obj->get_page();
    // Если имеется хотя бы одна запись - выводим
    if(!empty($news))
    {
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
         <td class="rightpanel_txt">
      <?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
      $patt = array("[b]", "[/b]", "[i]", "[/i]");
      $repl = array("", "", "", "");
      $pattern_url = "|\[url[^\]]*\]|";
      $pattern_b_url = "|\[/url[^\]]*\]|";
      for($i = 0; $i < count($news); $i++)
      {
        if(strlen($news[$i]['body']) > 100)
        {
          $news[$i]['body'] = substr($news[$i]['body'], 0, 100)."...";
          $news[$i]['body'] = str_replace($patt, $repl, $news[$i]['body']);
          $news[$i]['body'] = preg_replace($pattern_url, "", $news[$i]['body']);
          $news[$i]['body'] = preg_replace($pattern_b_url, "", $news[$i]['body']);
        }
  
        echo "<tr><td class=rightpanel_txt>
             <b>".$news[$i]['putdate']." | ".print_page($news[$i]['name'])."</b>
            <br> 
            ".print_page($news[$i]['body'])."
            <div align=\"right\">
              <a href=\"news.php?id_news=".$news[$i]['id_news']."\" 
                 class=\"rightpanel_lnk\">
                 <img src=\"dataimg/dot_lnk.gif\" 
                      hspace=\"6\" 
                      border=\"0\" 
                      align=\"absmiddle\">подробнее</a>
            </div>
            </td></tr>";
      }
      echo "</table>";
      // Выводим ссылки на другие страницы
      echo "<div class=rightpanel_txt>";
      echo $obj;
      echo "</div>";
    }
  }
  // Если GET-параметр id_news передан - выводим полную 
  // версию новостной позиции
  else
  {
    // Проверяем являюется ли параметр id_news числом
    $_GET['id_news'] = intval($_GET['id_news']); 
    // Выводим выбранную новостную позицию
    $query = "SELECT id_news,
                     name,
                     body,
                     DATE_FORMAT(putdate,'%d.%m.%Y') as putdate_format,
                     url,
                     urltext,
                     urlpict,
                     hide
              FROM $tbl_news
              WHERE hide = 'show' AND
                    id_news = $_GET[id_news]";
    $res = mysql_query($query);
    if(!$res) exit(mysql_error($query));
    $news = mysql_fetch_array($res);

    // Подключаем верхний шаблон
    $title = $news['name'];
    $keywords = "новости";
    require_once ("templates/top.php");
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
       <td class="rightpanel_txt">
    <?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
    $url_pict = "";
    if ($news['urlpict'] != '' && $news['urlpict'] != '-')
    {
      $url_pict = "<img align=right 
                        class=img 
                        src=".print_page($news['urlpict']).">";
    }

    $news_url = "";
    if (!empty($news['url']))
    {
      if(!preg_match("|^http://|i",$news['url']))
      {
        $news[$i]['url'] = "http://{$news[url]}";
      }
      $news_url = "<br><b>Ссылка:</b> 
                   <a href='".print_page($news['url']).">".
                              print_page($news['urltext'])."</a>";
      if(empty($news[$i]['urltext']))
      {
        $news_url = "<br><b>Ссылка:</b> 
                     <a href='".print_page($news['url'])."'>".
                                print_page($news['url'])."</a>";
      }
    }


    echo "<b>".$news['putdate_format']." | ".print_page($news['name'])."</b>
          <br> 
          $url_pict ".nl2br(print_page($news['body']))."
          <br>$news_url
          <br>";
   ?>
    </td>
    </tr>
    <tr>
    <td height="1" nowrap bgcolor="#004BBC"></td>
    </tr>
    </table>
  <?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  }
  //Подключаем нижний шаблон
  require_once ("templates/bottom.php");
?>