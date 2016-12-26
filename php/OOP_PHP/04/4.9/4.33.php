<form method=get>
<input type=text name=search 
       value=<?= htmlspecialchars($_GET['search'], ENT_QUOTES); ?>>   
<input type=submit value=Искать>
</form>
<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  require_once("class.pager_file_search.php");

  // Обработчик HTML-формы
  if(!empty($_GET))
  {
    // Объявляем объект постраничной навигации
    $obj = new pager_file_search($_GET['search'], "linux.words", 5);
  
    // Выводим содержимое текущей страницы
    $arr = $obj->get_page();
    for($i = 0; $i < count($arr); $i++)
    {
      echo "{$arr[$i]}<br>";
    }

    // Выводим ссылки на другие страницы
    echo $obj;
 }
?>
