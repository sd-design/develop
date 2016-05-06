<?php 
trait Foo{
	public function getName(){
		echo "Foo";
	}
}

trait Bar{
public function getName(){
		echo "Bar";
	}


}
class Baz {
use Foo, Bar;
public function getName(){
		echo "Baz";
	}
}
$baz = new Baz();
$baz->getName();
?>