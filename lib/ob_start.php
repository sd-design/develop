<?php 
ob_start();
echo 'Test';
$output = ob_end_clean();

echo $output;
?>