<?php

function fibonachi($x){

$numbers = array();
$count = $x;
while($count)	{

array_push($numbers,$count);
$count--;
}
echo "<hr/>";
$numbers = array_reverse($numbers);

$first = 1;
$second = 1;
$summ_odd = 0;
$summ_all = 0;
$numbers_odd = array();
foreach ($numbers as $key){



if (($first === 1)&& ($second === 1))$third = 1;

if(($third % 2) == 0){
$summ_odd = $summ_odd+$third;
array_push($numbers_odd,$third);
}
$summ_all = $summ_all+$third;
	echo $key.") ".$third."</br>";
$third = $first+$second;

$first = $second;
$second = $third;



}

echo "<hr/>";
foreach ($numbers_odd as $key2){
echo $key2."</br>";
	}
	echo "<hr/>";
echo $summ_odd."</br>";
echo $summ_all;

}

fibonachi(10);

?>