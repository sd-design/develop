<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  ////////////////////////////////////////////////////////////
  function menu_navigation($id_catalog, $link, $tbl_catalog)
  {
    // Предотвращаем 
    $id_catalog = intval($id_catalog);
    $query = "SELECT * FROM $tbl_catalog WHERE id_catalog = $id_catalog";
    $cat = mysql_query($query);
    if(!$cat) exit("Ошибка обращения к таблице каталога menu_navigation()".mysql_error());
    if(mysql_num_rows($cat) > 0)
    {
      $catalog = mysql_fetch_array($cat);
      $link = "<a class=menu href=index.php?id_parent=$catalog[id_catalog]>$catalog[name]</a>-&gt;".$link;
      $link = menu_navigation($catalog['id_parent'], $link, $tbl_catalog);
    }
    return $link;
  }
?>