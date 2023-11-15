<?php

    class Human {

        public $firstName;

        public $lastName;

        public $sexe;


        public function walk() {
            echo "Je marche !";
        }

    }

    class Teacher extends Human {

        public function correctEvaluations() {
            echo "Je corrige les évaluations !";
        }

    }

$test = new Teacher();

$test->correctEvaluations();
echo '<br>';
$test->walk();


?>