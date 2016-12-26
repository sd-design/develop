<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Подключаем объявление класса
  require_once("class.point.php");

  $arr = array(point::get_point(1, 1),
               point::get_point(2, 2),
               point::get_point(3, 0),
               point::get_point(4, 5));

  // Определяем минимальное и максимальное 
  // значения по оси абсцисс (X) и ординат (Y)
  $x_min = $x_max = $arr[0]->get_x();
  $y_min = $y_max = $arr[0]->get_y();
  for($i = 0; $i < count($arr); $i++)
  {
    if($x_min > $arr[$i]->get_x()) $x_min = $arr[$i]->get_x();
    if($x_max < $arr[$i]->get_x()) $x_max = $arr[$i]->get_x();
    if($y_min > $arr[$i]->get_y()) $y_min = $arr[$i]->get_y();
    if($y_max < $arr[$i]->get_y()) $y_max = $arr[$i]->get_y();
  }
  // Размер выводимого изображения
  $height = 100; // высота
  $width  = 100; // ширина

  // Создаем полноцветное изображение
  $img = imagecreatetruecolor($width, $width);
  if (!$img) exit("Ошибка создания изображения");
  // Определяем черный цвет
  $black = imagecolorallocate($img, 0, 0, 0);  
  // Определяем белый цвет	
  $white = imagecolorallocate($img, 255, 255, 255);
  // Заливаем белым цветом фон изображения
  imagefill($img, 0, 0, $white);
  // Рисуем ломанную
  for($i = 0; $i < count($arr) - 1; $i++)
  {
    $x1 = ($arr[$i]->get_x() - $x_min)*$width/($x_max - $x_min);
    $y1 = ($y_max - $arr[$i]->get_y())*$height/($y_max - $y_min);
    $x2 = ($arr[$i + 1]->get_x() - $x_min)*$width/($x_max - $x_min);
    $y2 = ($y_max - $arr[$i + 1]->get_y())*$height/($y_max - $y_min);
    imageline($img, $x1, $y1, $x2, $y2, $black);
  }
  // Выводим изображение в окно браузера
  header("Content-type: " .image_type_to_mime_type(IMAGETYPE_PNG));
  imagepng($img);
?>
