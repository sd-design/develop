<?php

function exsepter($folder){
switch ($folder) {
    case ".DS_Store":
        return false;
        break;
case "index.php":
        return false;
        break;
case ".gitignore":
        return false;
        break;
    case ".":
        return false;
        break;
    case "..":
        return false;
        break;
    case ".gitattributes":
        return false;
        break;
case ".git":
        return false;
        break;
case "favicon.ico":
        return false;
        break;
        default:
        return true;
}
}

$root = dirname(__FILE__);
$folders = scandir($root);
$count = count($folders);
for($i = 0; $i<$count; $i++){
if (exsepter($folders[$i]) == true){
echo "<a href='".$folders[$i]."'>".$folders[$i]."</a><br/>";
}

}


?>