    <?php
        
        class Person {
                public $isAlive = true;
            public $firstname;
             public $lastname;
              public $age;
               public $type;
            function __construct($firstname, $lastname, $age, $type){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->age = $age;
            $this->type = $type;
            }
            public function greet(){
             return "Hello, my name is " . $this->firstname . " " . $this->lastname . ". Nice to meet you! :-)</br>";   
            }
        }
        $teacher = new Person("boring", "12345", 12345, "teacher");
        $student = new Person("boring", "12345", 12345, "student");
         echo $teacher->isAlive;
        echo $teacher->firstname;
        echo $teacher->lastname;
        echo $teacher->age;
        echo $teacher->greet();
         echo $student->greet();
        ?>