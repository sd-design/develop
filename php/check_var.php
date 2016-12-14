<?php
/* задание 2 файл frm.php*/
if(!empty($_POST['name']) && !empty($_POST['email'])){

$User = $_POST['name'];

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  $AddressUser = $_POST['email'];
echo $AddressUser.'    '.$User;
}
}

?>