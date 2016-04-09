<?php

function exsepter($folder){
switch ($folder) {
    case ".DS_Store":
        return false;
        break;
    case ".":
        return false;
        break;
    case "..":
        return false;
        break;
        default:
        return true;
}

}

$root = $_SERVER["DOCUMENT_ROOT"];
$folders = scandir($root);
$count = count($folders);
$i = 0;
while($i <= $count){
if (exsepter($folders[$i]) == true){
echo "<a href='".$folders[$i]."'>".$folders[$i]."</a><br/>";
}
$i++;
}


?>