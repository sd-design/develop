<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ������ ��������� ������ ��������� ������
  $dblocation = "localhost";
  // ��� ���� ������, �� �������� ��� ��������� ������
  $dbname = "oop";
  // ��� ������������ ���� ������
  $dbuser = "root";
  // � ��� ������
  $dbpasswd = "";

  // ���� ������
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

  // ������������� ���������� � ����� ������
  $dbcnx = mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx) {
   exit( "<P>� ��������� ������ ������ ���� ������ �� ��������, ������� ���������� ����������� �������� ����������.</P>" );
  }
  // �������� ���� ������
  if (! @mysql_select_db($dbname,$dbcnx) ) {
    exit( "<P>� ��������� ������ ���� ������ �� ��������, ������� ���������� ����������� �������� ����������.</P>" );
  }

  @mysql_query("SET NAMES 'cp1251'");
?>