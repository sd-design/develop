<?php 
#comment
trait Foo{
	public function getName(){
		echo "Foo";
	}
}

class Bar{
public function getName(){
		echo "Bar";
	}


}
class Baz  extends Bar{
use Foo;

}
$baz = new Baz();
$baz->getName();
?>