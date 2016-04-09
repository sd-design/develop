<?php
//start
ob_start();
header('Content-Type:text/xml; charset=UTF-8', true);


$name = $_GET['name'];
$userNames = array("Alex","Nick",'Ron');

echo '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>';
echo '<response>';
if (in_array($name, $userNames))
echo 'Привет, мастер '.html_entity_decode($name, ENT_NOQUOTES, 'UTF-8').'!';

	else if($name == '') 	echo 'Скажи мне - кто ты незнакомец';
else echo html_entity_decode($name, ENT_NOQUOTES, 'UTF-8').', вы нам незнакомы!';



echo '</response>';
 ob_end_flush();

?>