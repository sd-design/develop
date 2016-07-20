<?php
if (filter_var('chessman@devita.store', FILTER_VALIDATE_EMAIL)) { 
    echo 'VALID';
} else {
    echo 'NOT VALID';
}
?>
