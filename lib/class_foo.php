<?php 
class Foo {

private static $name = 'Foo';
public static function getName(){
	return static::$name;
}

}
class Bar extends Foo{
private static $name = 'Bar';

}
echo Bar::getName();
?>