<?php
require_once('Evernote.Class.php');
require_once('Crypto.class.php');
session_start();
//создаем новый объект
$mail = new Evernote();

//$recepient = "chessman@yandex.ru";
$action = $_POST['action'];
if ($action === "list"){ $mail->list_rows(); }
if ($action === "read"){ 
	$ckey = $_SESSION["cryptkey"];
	$filename = $_POST['file'];
	$post = $mail->open($filename);
	$decrypted = UnsafeCrypto::decrypt($post, $ckey, true);
	echo $decrypted;
}



//mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");


?>
