<?php


    abstract class Animal {

        public $firstName;

        public $lastName;


        public function manger() {
            echo "Je mange des croquettes !";
        }

        abstract public function parler();
    }

    
    class Cat extends Animal {
        public function parler() {
            echo "Miaou !";
        }
    }


    class Dog extends Animal {
        public function parler() {
            echo "Wouaf !";
        }
    }


    class Lion extends Animal {

        //  surchage de la méthode héritée de la classe parent Animal
        public function manger() {
            echo "moi, je mange des steaks !";
        }

        public function parler() {
            echo "rooar !";
        }

    }

    $lion = new Lion;
    $lion->parler();
    echo '<br>';
    $lion->manger();



?>