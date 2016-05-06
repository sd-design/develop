<?php 
class Foo {
	
public static function getClassName(){
	return __CLASS__;
}

}
class Bar extends Foo{}
echo Bar::getClassName();;



?>