<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // ���������� ���������� ������
  require_once("class.ExceptionSQL.php");

  try
  {
    if(rand(0,1)) throw new ExceptionSQL("��������� ����������");
  }
  catch(ExceptionSQL $exp)
  {
    // �������� ��������� ���� ������� exception,
    // ��������������� ����������
    $id_exception = $exp->getID();
    // ��������� ���������� �� ��������������
    // ��������
    $query = "SELECT * FROM exception 
              WHERE id_exception = $id_exception";
    $ext = mysql_query($query);
    if(!$ext) exit("������ ���������� ����������");
    $exception = mysql_fetch_array($ext);
    echo "<table border=1 cellpadding=5>";
    echo "<tr>
           <td>���������:</td>
           <td>$exception[message]</td>
          </tr>";
    echo "<tr>
           <td>���:</td>
           <td>$exception[code]</td>
          </tr>";
    echo "<tr>
           <td>����:</td>
           <td>$exception[file]</td>
          </tr>";
    echo "<tr>
           <td>������:</td>
           <td>$exception[line]</td>
          </tr>";
    echo "<tr>
           <td>����:</td>
           <td><pre>{$exception[trace]}</pre></td>
          </tr>";
    echo "<tr>
           <td>�����:</td>
           <td>$exception[putdate]</td>
          </tr>";
  }
?>
