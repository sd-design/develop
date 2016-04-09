<!DOCTYPE html>
<html lang="ru">
<head>
<title>MD5 PHP coder</title>
</head>
<body>
<?php
if($_POST['phrase'] || $_POST[go]=="gohomeyanki"){
if ($_POST[go]=="gohomeyanki"){

$phraze= $_POST['phrase'];
$phraze = base64_encode(md5($phraze));
echo "<h3>".$phraze."</3>";
}
}
else {echo "<form action='decode_pwd.php'  method='post'><input type='hidden' name='go' value='gohomeyanki'><input type='password' name='phrase' size='47'>
<input type='submit' name='отправить'>
</form><br/>";
}
?>

</body>
</html>