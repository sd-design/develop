<?php 
ob_start();
echo 'Test';
$output = ob_get_contents();
ob_end_clean();
echo $output;
?>