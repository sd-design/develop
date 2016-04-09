<?php
session_start();
$today = date("Y-m-d H:i:s");
$key = md5($today);
$_SESSION["key"] = $key;
echo $key;

if(isset($_GET['crypt_key'])){
 $_SESSION["cryptkey"] = $_GET['crypt_key'];
 echo $_SESSION["cryptkey"];	
}



?>
