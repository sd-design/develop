<?php
require_once('js/Evernote.Class.php');
session_start();
//echo $_SESSION["cryptkey"];	

//создаем новый объект
$mail = new Evernote();

if (isset( $_GET['file'])){
	$filename = $_GET['file'];
	$post = $mail->decode($filename);

echo $post;
}
$mail->hello($_SESSION['cryptkey']);
echo "<br/>";
echo $php_errormsg;
//echo $mail->list_rows();

//mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");


?>
