<?php
// Зашифровываем пароль
$user_password = "gfkjxrb99_vot_tak_vot";
$key = "BYE123q78321";
$key2 = "BYE123q78321";
// Шифруем пароль с использованием ключа $key
$input = base64_encode($user_password).base64_encode($key);
echo "input -- ".$input."<br/>";
$user_crypt = base64_encode($input);
echo "Зашифрованный пароль – ".$user_crypt."<br/>";

// Расшифровываем пароль
$key_down = strlen(base64_encode($key2));
echo "key count : ".$key_down."<br/>";
$user_crypt = base64_decode($user_crypt);
$ouput = substr($user_crypt, 0, -$key_down);
echo "Output -- ".$ouput."<br/>";
$user_crypt2 = base64_decode($ouput);
echo "<br/><br/>Расшифрованный пароль – ".$user_crypt2;
?>