<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class pager
  {
    protected function __construct()
    {
    }
    protected function get_total()
    {
      // Общее количество записей
    }
    protected function get_pnumber()
    {
      // Количество позиций на странице
    }
    protected function get_page_link()
    {
      // Количество ссылок слева и справа
      // от текущей странице
    }
    protected function get_parameters()
    {
      // Дополнительные параметры, которые
      // необходимо передать по ссылке
    }
    
    // Альтернативный способ постраничной навигации
    public function print_page()
    {
      // Строка для возвращаемого результата
      $return_page = "";

      // Через GET-параметр page передается номер
      // текущей страницы
      $page = $_GET['page'];
      if(empty($page)) $page = 1;

      // Вычисляем число страниц в системе
      $number = (int)($this->get_total()/$this->get_pnumber());
      if((float)($this->get_total()/$this->get_pnumber()) - $number != 0)
      {
        $number++;
      }

      // Ссылка на первую страницу
      $return_page .= "<a href='$_SERVER[PHP_SELF]".
                      "?page=1{$this->get_parameters()}'>".
                      "&lt;&lt;</a> ... ";
      // Выводим ссылку "Назад", если это не первая страница 
      if($page != 1) $return_page .= " <a href='$_SERVER[PHP_SELF]".
                      "?page=".($page - 1)."{$this->get_parameters()}'>".
                      "&lt;</a> ... "; 
      
      // Выводим предыдущие элементы 
      if($page > $this->get_page_link() + 1) 
      { 
        for($i = $page - $this->get_page_link(); $i < $page; $i++) 
        { 
          $return_page .= "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a> "; 
        } 
      } 
      else 
      { 
        for($i = 1; $i < $page; $i++) 
        { 
          $return_page .= "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a> "; 
        } 
      } 
      // Выводим текущий элемент 
      $return_page .= "$i "; 
      // Выводим следующие элементы 
      if($page + $this->get_page_link() < $number) 
      { 
        for($i = $page + 1; $i <= $page + $this->get_page_link(); $i++) 
        { 
          $return_page .= "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a> "; 
        } 
      } 
      else 
      { 
        for($i = $page + 1; $i <= $number; $i++) 
        { 
          $return_page .= "<a href='$_SERVER[PHP_SELF]?page=$i'>$i</a> "; 
        } 
      } 

      // Выводим ссылку "вперед", если это не последняя страница 
      if($page != $number) $return_page .= " ... <a href='".
                           "$_SERVER[PHP_SELF]?page=".
                           ($page + 1)."{$this->get_parameters()}'>".
                           "&gt;</a>"; 
      // Ссылка на последнюю страницу
      $return_page .= " ... <a href='$_SERVER[PHP_SELF]".
                      "?page=$number{$this->get_parameters()}'>".
                      "&gt;&gt;</a>";
  
      return $return_page;
    }
  }
?>