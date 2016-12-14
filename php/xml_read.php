<?php
$xml = simplexml_load_file('test_xml.xml');

foreach($xml->channel as $i){
echo $i->title.'<br>';
echo $i->adress.'<br>';
echo $i->phone.'<br>';
echo $i->link.'<br>';
}




?>