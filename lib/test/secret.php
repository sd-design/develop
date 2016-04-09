<?php

if (empty($_POST['key']))
{
		header('Location:login.php');
	exit();
}
$transfer =md5($_POST['key']);
if ($transfer!= md5('roger'))
{

	header('Location:login.php');
	exit();
}
echo "SECRET file";


?>