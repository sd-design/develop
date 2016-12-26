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

  class shop
  {
    public static $lock = false;

    // Вывод диагностического сообщения
    private function error_print($str)
    {
      // Освобождаем таблицу
      shop::$lock = false;
      // Выводим диагностическое сообщение
      echo $str;
    }

    public function buy($id_user, $buy_count)
    {
      // Преобразуем параметр в целое число
      $id_user = intval($id_user);
      // Проверяем, не занята ли база данных другим
      // покупателем
      $count = 0;
      while(shop::$lock)
      {
        // Приостанавливаем работу программы
        // на 1 секунду
        sleep(1);
        $count++;
        // После 30 попыток покидаем метод
        if($count > 30) return false;
      }

      // База данных доступна - занимаем ее
      shop::$lock = true;

      // Осуществляем операции транзакции

      // 1. Запрашиваем количество товара на складе
      $query = "SELECT * FROM warehouse 
                WHERE id_position = 1";
      $tot = mysql_query($query);
      if(!$tot)
      {
        // Выводим диагностическое сообщение
        $this->error_print("Ошибка доступа к складской таблице");
        // Покидаем метод
        return false;
      }
      list($id_position,$total,$price) = mysql_fetch_array($tot);
      // Если товара на складе ноль или меньше,
      // прекращаем осуществление сделки
      if($total <= 0)
      {
        $this->error_print("Закончились запасы на складе");
        return false;
      }

      // 2. Запросить денежные средства клиента и оценить, 
      // хватит ли их для оплаты товара
      $query = "SELECT money FROM users WHERE id_user = $id_user";
      $mon = mysql_query($query);
      if(!$mon) 
      {
        $this->error_print("Ошибка доступа к счету пользователя");
        return false;
      }
      if(mysql_num_rows($mon)) $money = mysql_result($mon,0);
      // Если сумма, требуемая для покупки $buy_count
      // товаров больше, чем денег на счете
      // пользователя $money, - покидаем метод
      if($buy_count*$price > $money)
      {
        $this->error_print("Не достаточно средств для покупки");
        return false;
      }

      // 3. Уменьшаем количество товаров 
      // на складе на $buy_count
      $query = "UPDATE warehouse 
                SET total = total - $buy_count 
                WHERE id_position = 1";
      mysql_query($query);

      // 4-5. Увеличиваем количество заказанных клиентом 
      // товаров на $buy_count и списываем денежные
      // средства со счета заказчика
      $query = "UPDATE users
                SET total = total + $buy_count,
                    money = money - ".($buy_count*$price)."
                WHERE id_user = $id_user";
      mysql_query($query);

      // 6. Зачисляем денежные средства на счет магазина
      $query = "UPDATE bill
                SET total = total + ".($buy_count*$price);
      mysql_query($query);

      // Освобождаем таблицу
      shop::$lock = false;
      // Возвращаем значение true, сигнализирующее об
      // успешном завершении транзакции
      return true;
    }
  }
?>
