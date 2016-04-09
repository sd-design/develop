<?php

class Evernote{

public $baseKey;
public $route;

public function __construct() {
	$this->route = $_SERVER["DOCUMENT_ROOT"];
	$this->baseKey = "NWIwNmM1NjlkNDQ5YzRmNTFlNDljYjM3ZDJhNjVmYjM=";

}


public function encode($in){

$input = base64_encode($in).base64_encode(md5($this->baseKey));
$line_crypt = base64_encode($input);
return $line_crypt;
}

public function decode($in){
	$root = $this->route;
	$file =$root."/evernote/_data/".$in;

$row = file_get_contents($file);

$key_down = strlen(base64_encode(md5($this->baseKey)));
$user_crypt = base64_decode($row);
$out = substr($user_crypt, 0, -$key_down);
$output = base64_decode($out);

return $output;

}

public function write($input){
$root = $this->route;
$today = date("Y-m-dHis");
$filename = $today.".evnt";
$file_post = $root."/evernote/_data/".$filename;

$fpp = @fopen($file_post, "x");
fputs($fpp, $input);
fclose($fpp);
return $filename;

}

public function open($in){
	$root = $this->route;
	$file =$root."/evernote/_data/".$in;

$row = file_get_contents($file);
return $row;

}

public function list_rows(){

$home = $this->route."/evernote/_data";
$files = scandir($home);
$i = 0;
$end = count($files);
while($i<$end){
    if (($files[$i] === ".") || ($files[$i] === "..") || ($files[$i] === ".DS_Store")) unset($files[$i]);
    $i++;
}
reset($files);
rsort($files);

    echo json_encode(array('files' => $files));
    exit;
}

public function hello($cryptkey){

echo "My Evernote - version 1.0<br/>Status 'OK'<br/>";
echo $cryptkey;
	}
}

?>