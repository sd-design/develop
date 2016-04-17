        <?php
        class Cat{
            
            public $isAlive = true;
            public $numLegs = 4;
           public $name;
           function __construct($name){
			$this->naming = $name;
			
                }
            
          
            public function meow(){
               return "Meow meow"; 
            }
			  }
        echo "hello<br>";
        $cat = new Cat("CodeCat");
		echo $cat->naming.": - ";
        echo $cat->meow();
        ?>