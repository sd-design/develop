<?php
require_once('js/Evernote.Class.php');
require_once('js/Crypto.class.php');
session_start();

// проверка ключей сессии и из формы
$key_tmp = $_SESSION['key'];
$key = trim($_POST["key"]);
if ($key != $key_tmp) { 
$row = "ERROR session key - ".$key."\n\n".$key_tmp;
	$fp = @fopen("log.txt", "a+");
fputs($fp, $row);
fclose ($fp);; exit;}

//создаем новый объект
$mail = new Evernote();

//$recepient = "chessman@yandex.ru";

$email = trim($_POST["email"]);
$theme = trim($_POST["theme"]);
$message = trim($_POST["message"]);

$row = "E-mail: $email \nТема: $theme\nЗаметка: $message";

$ckey = $_SESSION["cryptkey"];
$input = UnsafeCrypto::encrypt($row, $ckey, true);
$mail->write($input);

//mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");


?>
