<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // сейчас выставлен сервер локальной машины
  $dblocation = "localhost";
  // Имя базы данных, на хостинге или локальной машине
  $dbname = "oop";
  // Имя пользователя базы данных
  $dbuser = "root";
  // и его пароль
  $dbpasswd = "";

  // Базы данных
  $tbl_accounts         = 'system_accounts';
  $tbl_news             = 'system_news';
  $tbl_catalog          = 'system_menu_catalog';
  $tbl_position         = 'system_menu_position';
  $tbl_paragraph        = 'system_menu_paragraph';
  $tbl_paragraph_image  = 'system_menu_paragraph_image';
/*  $forms            = 'system_forms';
  $elements         = 'system_elements';
  $faq_catalog      = 'system_faq_catalog';
  $faq_position     = 'system_faq_position';
  $news             = 'system_news';
  $catalog          = 'system_catalog';
  $position         = 'system_position';
  $cities           = 'system_cities';
  $paragraph        = 'system_paragraph';
  $paragraph_image  = 'system_paragraph_image';
  $paragraph_file   = 'system_paragraph_file';
  $users            = 'system_users';
  $statistics       = 'system_statistics';
  $subscription     = 'system_subscription';
  $statistics_total = 'system_statistics_total';
  $files            = 'system_files';

  $menu_catalog     = 'system_menu_catalog';
  $menu_position    = 'system_menu_position';
  $menu_paragraph   = 'system_menu_paragraph';
  $menu_paragraph_image = 'system_menu_paragraph_image';

  $sendemail        = 'system_sendemail';
  $mail_subscribe   = 'system_mail_subscribe';
  $currency         = 'system_currency';
  $links            = 'system_links';
  $main_position    = 'system_main_position';
  $main_paragraph   = 'system_main_paragraph';
  $title            = 'system_title';*/

  // Устанавливаем соединение с базой данных
  $dbcnx = mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx) {
   exit( "<P>В настоящий момент сервер базы данных не доступен, поэтому корректное отображение страницы невозможно.</P>" );
  }
  // Выбираем базу данных
  if (! @mysql_select_db($dbname,$dbcnx) ) {
    exit( "<P>В настоящий момент база данных не доступна, поэтому корректное отображение страницы невозможно.</P>" );
  }

  @mysql_query("SET NAMES 'cp1251'");
?>