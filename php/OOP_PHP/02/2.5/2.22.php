<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) �������� �.�., �������� �.�.
  // �������� ��������������� ���������������� �� PHP
  // IT-������ SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // ���������� ������� ��������� ������ 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  class employee
  {
    public $surname;
    public $name;
    public $patronymic;
    
    public function __call($method, $parameters)
    {
      if($method == "set_age")
      {
        $parameters[0] = intval($parameters[0]);
        if($parameters[0] >= 18 && $parameters[0] <= 65)
        {
          $this->age = $parameters[0];
        }
      }
    }
  }
?>
