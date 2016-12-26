<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  ////////////////////////////////////////////////////////////
  // ������� ������������ ���������
  // $page - ������� ��������, ��������� ����� GET-�������� page
  // $total - ����� ����� ������� � ���� ������
  // $pnumber - ����� ������� �� ����� ��������
  // $page_link - ����� ������ ����� � ������ �� ��������� ��������
  ///////////////////////////////////////////////////////////
  function pager($page, $total, $pnumber, $page_link, $parameters)
  {
    // ��������� ����� ������� � �������
    $number = (int)($total/$pnumber);
    if((float)($total/$pnumber) - $number != 0) $number++;
    // ��������� ���� �� ������ �����
    if($page - $page_link > 1)
    {
      echo "<a href=$_SERVER[PHP_SELF]?page=1{$parameters}> <nobr>[1-$pnumber]</nobr></a>&nbsp;<em class=currentpage><nobr>&nbsp;...&nbsp;</nobr> </em>&nbsp;";
      // ����
      for($i = $page - $page_link; $i<$page; $i++)
      {
          echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}> <nobr>[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</nobr></a>&nbsp;";
      }
    }
    else
    {
      // ���
      for($i = 1; $i<$page; $i++)
      {
          echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}> <nobr>[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</nobr></a>&nbsp;";
      }
    }
    // ��������� ���� �� ������ ������
    if($page + $page_link < $number)
    {
      // ����
      for($i = $page; $i<=$page + $page_link; $i++)
      {
        if($page == $i)
          echo "<em class=currentpage><nobr>&nbsp;[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;</nobr> </em>";
        else
          echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}> <nobr>[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</nobr></a>&nbsp;";
      }
      echo "<em class=currentpage><nobr>&nbsp;...&nbsp;</nobr> </em>&nbsp;<a href=$_SERVER[PHP_SELF]?page=$number{$parameters}> <nobr>[".(($number - 1)*$pnumber + 1)."-$total]</nobr></a>&nbsp;";
    }
    else
    {
      // ���
      for($i = $page; $i<=$number; $i++)
      {
        if($number == $i)
        {
          if($page == $i)
            echo "<em class=currentpage><nobr>&nbsp;[".(($i - 1)*$pnumber + 1)."-$total]&nbsp;</nobr></em>";
          else
            echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}>[".(($i - 1)*$pnumber + 1)."-$total]</a>&nbsp;";
        }
        else
        {
          if($page == $i)
            echo "<em class=currentpage><nobr>&nbsp;[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;</nobr> </em>";
          else
            echo "&nbsp;<a href=$_SERVER[PHP_SELF]?page=$i{$parameters}> <nobr>[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]</nobr></a>&nbsp;";
        }
      }
    }
    //echo "<br><br>";
  }
?>