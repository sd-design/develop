<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  if(!defined("ARTICLE")) return;
  if(!preg_match("|^[\d]+$|",$_GET['id_position'])) return;
  if(!preg_match("|^[\d]+$|",$_GET['id_catalog'])) return;
  // Обработка текста перед выводом
  require_once("dmn/utils/utils.print_page.php");

  // Выводим список каталогов
  $query = "SELECT * FROM $tbl_paragraph
            WHERE id_position = $_GET[id_position] AND 
                  id_catalog = $_GET[id_catalog] AND
                  hide = 'show'
            ORDER BY pos";
    
  $par = mysql_query($query);
  if(!$par) exit("Ошибка при обращении к параграфам позиции");
  $type_catalog = "";
  if(mysql_num_rows($par)>0)
  {
    while($paragraph = mysql_fetch_array($par))
    {
      // Выясняем тип выравнивания параграфа
      $align = "";
      switch($paragraph['align'])
      {
        case 'left':
          //$type .= " (слева)";
          $align = "left";
          break;
        case 'center':
          //$type .= " (по центру)";
          $align = "center";
          break;
        case 'right':
          //$type .= " (справа)";
          $align = "right";
          break;
      }

      // Изображения позиции
      $image_print = "";
      $query = "SELECT * FROM $tbl_paragraph_image
                WHERE id_paragraph = $paragraph[id_paragraph] AND
                      id_position = $_GET[id_position] AND
                      id_catalog = $_GET[id_catalog] AND
                      hide = 'show'";
      $img = mysql_query($query);
      if(!$img) exit("Ошибка при извлечении изображений");
      if(mysql_num_rows($img))
      {
        // Извлекаем изображения
        unset($img_arr);
        while($image = mysql_fetch_array($img))
        {
          // ALT-тэг
          if(!empty($image['alt'])) $alt = "alt='$image[alt]'";
          else $alt = "";
          // Размер малого изображения
          $size_small = @getimagesize($image['small']);
          // Название изображения
          if(!empty($image['name']))
          {
            $name = "<br><br><b>".$image['name']."</b>";
          }
          else $name = "";
          // Большое изображение
          if(empty($image['big']))
          {
            $img_arr[] = "<img $alt src='$image[small]' 
                               width=$size_small[0] 
                               height=$size_small[1]>$name";
          }
          else
          {
            $size = @getimagesize($image['big']);
            $img_arr[] = "<a href=# 
                           onclick=\"show_img('$image[id_image]',".$size[0].",".$size[1]."); return false \">
                          <img $alt src='$image[small]' 
                               border=0 
                               width=$size_small[0] 
                               height=$size_small[1]></a>$name";
          }
        }
        for($i = 0; $i < count($img_arr)%3; $i++) $img_arr[] = "";
        // Выводим изображения
        for($i = 0, $k = 0; $i < count($img_arr); $i++, $k++)
        {
          if($k == 0) $image_print .= "<table cellpadding=5><tr valign=top>";
          $image_print .= "<td class=\"main_txt\">".$img_arr[$i]."</td>";
          if($k == 2)
          {
            $k = -1;
            $image_print .= "</tr></table>";
          }
        }
      }

      // Выясняем тип параграфа
      $class = "rightpanel_txt";
      switch($paragraph['type'])
      {
        case 'text':
          $class = "rightpanel_txt";
          echo "<tr>
                  <td class=\"$class\">
                    <p align=$align>".print_page($paragraph['name']).
                   "<br>$image_print</p>
                  </td>
                </tr>";
          break;
        case 'title_h1':
          $class = "rightpanel_ttl";
          echo "<tr>
                  <td class=\"$class\">
                    <h1 align=$align>".print_page($paragraph['name']).
                   "<br>$image_print</h1>
                  </td>
                </tr>";
          break;
        case 'title_h2':
          $class = "rightpanel_ttl";
          echo "<tr>
                  <td class=\"$class\">
                    <h2 align=$align>".print_page($paragraph['name']).
                   "<br>$image_print</h2>
                  </td>
                </tr>";
          break;
        case 'title_h3':
          $class = "rightpanel_ttl";
          echo "<tr>
                  <td class=\"$class\">
                    <h3 align=$align>".print_page($paragraph['name']).
                   "<br>$image_print</h3>
                  </td>
                </tr>";
          break;
        case 'title_h4':
          $class = "rightpanel_ttl";
          echo "<tr>
                  <td class=\"$class\">
                    <h4 align=$align>".print_page($paragraph['name']).
                   "<br>$image_print</h4>
                  </td>
                </tr>";
          break;
        case 'title_h5':
          $class = "rightpanel_ttl";
          echo "<tr>
                  <td class=\"$class\">
                    <h5 align=$align>".print_page($paragraph['name']).
                   "<br>$image_print</h5>
                  </td>
                </tr>";
          break;
        case 'title_h6':
          $class = "rightpanel_ttl";
          echo "<tr>
                  <td class=\"$class\">
                    <h6 align=$align>".print_page($paragraph['name']).
                   "<br>$image_print</h6>
                  </td>
                </tr>";
          break;
      }
    }
  }
?>
<script language='JavaScript1.1' type='text/javascript'>
<!--
  function show_img(id_image,width,height,adm)
  {
    var a;
    var b;
    var url;
    vidWindowWidth=width;
    vidWindowHeight=height;
    a=(screen.height-vidWindowHeight)/5;
    b=(screen.width-vidWindowWidth)/2;
    features = "top=" + a + 
               ",left=" + b + 
               ",width=" + vidWindowWidth + 
               ",height=" + vidWindowHeight + 
               ",toolbar=no,menubar=no,location=no,directories=no,scrollbars=no,resizable=no";
    url="show.php?id_image=" + id_image;
    window.open(url,'',features,true);
  }
//-->
</script>