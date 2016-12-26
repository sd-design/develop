<?php
  ////////////////////////////////////////////////////////////
  // 2006-2007 (C) Кузнецов М.В., Симдянов И.В.
  // Объектно ориентированное программирование на PHP
  // IT-студия SoftTime (http://www.softtime.ru)
  ////////////////////////////////////////////////////////////
  // Выставляем уровень обработки ошибок 
  // (http://www.softtime.ru/info/articlephp.php?id_article=23)
  error_reporting(E_ALL & ~E_NOTICE);
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  class user
  {
    // Конструктор
    public function __construct($name, $password)
    {
      $this->name     = $name;
      $this->password = $password;
      $this->referrer = $_SERVER['PHP_SELF'];
      $this->time     = time();
    }
    // Доступ к закрытым членам
    public function __get($value)
    {
      if(isset($this->$value)) return $this->$value;
      else return false;
    }
    // Редактирование объекта перед серилизацией
    public function __sleep()
    {
      // Экранируем специальные символы
      $name     = mysql_real_escape_string($this->name);
      $referrer = mysql_real_escape_string($this->referrer);

      // Обнуляем поля с паролем
      $password = "";

      // Преобразуем дату к формату MySQL
      $time = date("Y-m-d H:i:s", $this->time);

      // Формируем и выполняем SQL-запрос
      $query = "INSERT INTO object_user 
                VALUES (NULL, 
                       '$name', 
                       '$password', 
                       '$referrer', 
                       '$time')";
      if(!mysql_query($query))
      {
        // В случае неудачи возвращает массив со значением false
        return array(false);
      }
      else
      {
        // В случае успеха возвращаем значение первичного ключа,
        // автоматически назначенного записи посредством
        // механизма AUTO_INCREMENT
        $id = mysql_insert_id();
        return array("$id"); // O:4:"user":1:{s:2:"$id";N;}
      }
    }
    // Статический метод обработки результатов серилизации;
    // возвращается уникальный номер объекта в базе данных
    public static function serialize($ser)
    {
      preg_match("|\"([\d]+)\"|", $ser, $out);
      return $out[1];
    }
    // Статический метод восстановления объекта из базы данных
    public static function unserialize($id_user)
    {
      // Приводим параметр к целому числу, предотвращая
      // SQL-инъекцию
      $id_user = intval($id_user);

      // Формируем и выполняем запрос на получение записи
      // с объектом
      $query = "SELECT * FROM object_user 
                WHERE id_user = $id_user";
      $obj = mysql_query($query);
      // При возникновении ошибки возвращаем false,
      // что сигнализирует о неудачном восстановлении объекта
      if(!$obj) return false;
      // Если в таблице нет ни одной записи, также возвращаем
      // false
      if(!mysql_num_rows($obj)) return false;
      $object = mysql_fetch_array($obj);
      // Формируем и возвращаем объект
      return new user($object['name'], $object['pass']);
    }

    // Имя пользователя
    private $name;
    // Его пароль
    private $password;
    // Последняя посещенная страница
    private $referrer;
    // Время авторизации пользователя
    private $time;
  }
?>
