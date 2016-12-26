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
  // Выпадающий список select с городами
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок (http://www.softtime.ru/info/articlephp.php?id_article=23)
  Error_Reporting(E_ALL & ~E_NOTICE);

  class field_city extends field_select
  {
    protected $alternative;
    // Конструктор класса
    function __construct($name, 
                   $caption, 
                   $value,
                   $multi = false,
                   $select_size = 4,
                   $parameters = "", 
                   $help = "",
                   $help_url = "",
                   $pos = 0,
                   $id_form = 0)
    {
      // Вызываем конструктор базового класса field для 
      // инициализации его данных
      field_select::__construct($name, 
                   $caption, 
                   $options,
                   $value,
                   $multi,
                   $select_size,
                   $parameters, 
                   $help,
                   $help_url,
                   $pos,
                   $id_form);
      // Изменяем тип
      $this->type = 'city';
      // Водим альтернативный город, если он введён через параметр $parameters
      $this->alternative = $parameters;
      // Загружаем города $options
      if($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "www.ru")
      {
        if(!is_array($this->value)) $this->value = preg_split('#\\\r\\\n#',$this->value);
      }
      else
      {
        if(!is_array($this->value)) $this->value = preg_split('#\r\n#',$this->value);
      }
    }

    // Метод, для возврата имени названия поля
    // и самого тэга элемента управления
    function get_html()
    {
      global $cities;

      // Если элементы оформления не пусты - учитываем их
      if(!empty($this->css_style)) $style = "style=\"".$this->css_style."\"";
      else $style = "";
      if(!empty($this->css_class)) $class = "class=\"".$this->css_class."\"";
      else $class = "";

      if($this->multi && $this->select_size) $multi = "multiple size=".$this->select_size;
      else $multi = "";

      // Проверяем не задал ли пользователь альтернативный город
      if(!empty($this->alternative) && empty($this->value))
      {
        // Проверяем нет ли такого города в базе данных
        if (!get_magic_quotes_gpc()) $this->alternative = mysql_escape_string($this->alternative);

        $query = "SELECT * FROM $cities WHERE name = '".$this->alternative."'";
        $cit = mysql_query($query);
        if(mysql_num_rows($cit))
        {
          // Такой город уже имеется в базе данных,
          // Поэтому предаём $this->value значение первичного ключа
          $id = mysql_fetch_array($cit);
          $this->value = $id['id_city'];
        }
      }
      // Формируем поле ввода для альтернативного города
      $alternative = "<input $style $class
                       type=\"".$this->type."\" 
                       name=\"".$this->name."\" 
                       value=\"".htmlspecialchars($this->alternative, ENT_QUOTES)."\"
                       $size $maxlength>\n";
      
      // Формируем тэг
      $tag = "<select $style $class name=\"".$this->name."\" $multi>\n";
      // Извлекаем города из базы данных
      $query = "SELECT * FROM $cities ORDER BY name";
      $cit = mysql_query($query);
      if(!$cit) exit("Ошибка при обращении к списку городов");
      if(mysql_num_rows($cit))
      {
        $tag .= "<option value='0' $selected>Выбрать город</option>\n";
        while($cit_result = mysql_fetch_array($cit))
        {
          if($cit_result['id_city'] == trim($this->value)) $selected = "selected";
          else $selected = "";
          $tag .= "<option value='".htmlspecialchars($cit_result['id_city'], ENT_QUOTES)."' $selected>".htmlspecialchars($cit_result['name'], ENT_QUOTES)."</option>\n";
        }
      }
      $tag .= "</select>\n";

      // Формируем подсказку, если она имеется
      $help = "";
      if(!empty($this->help)) $help .= "<span style='color:blue'>".nl2br($this->help)."</span>";
      if(!empty($help)) $help .= "<br>";
      if(!empty($this->help_url)) $help .= "<span style='color:blue'><a href=".$this->help_url.">помощь</a></span>";

      return array($this->caption, $tag, $help, $alternative);
    }

    // Метод, проверяющий корректность переданных данных
    function check()
    {
      global $cities;
      if (!get_magic_quotes_gpc()) 
      {
        for($i = 0; $i < count($this->value); $i++)
        {
          $this->value[$i] = mysql_escape_string($this->value[$i]);
        }
      }
      // Получаем список возможных значений списка
      if($this->is_required)
      {
        // Извлекаем города из базы данных
        $id_city = $this->selected();
        $id_city = (int)$id_city;
        $query = "SELECT COUNT(*) FROM $cities WHERE id_city=".$id_city." LIMIT 1";
        $cit = mysql_query($query);
        if(!$cit) exit("Ошибка при обращении к списку городов".mysql_error());
        if(@mysql_result($cit, 0) <= 0) return "Поле \"".$this->caption."\" содержит недопустимое значение";
      }

      return "";
    }
    // Выбранный элемент
    function selected()
    {
      return $this->value[0];
    }
    // Метод, возвращающий собственное имя
    function get_himself_name()
    {
      return __CLASS__;
    }
  }
?>