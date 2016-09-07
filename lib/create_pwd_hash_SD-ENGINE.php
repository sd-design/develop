<?php
$get = $_GET['pwd'];
echo base64_encode(md5($get));
echo "<br>";
$key ="BYE123q78321";
$key_down = strlen(base64_encode($key));
echo base64_decode(substr(base64_decode($get), 0, -$key_down));

?>
