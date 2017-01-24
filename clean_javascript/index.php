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

$root = __DIR__;
$folders = scandir($root);
echo "<h1>$root</h1>";
echo "<ol>";
$count = count($folders);
for($i = 0; $i<$count; $i++){
if (exsepter($folders[$i]) == true){
echo "<li><a href='".$folders[$i]."'>".$folders[$i]."</a></li><br/>";
}

}
echo "</ol>";

?>