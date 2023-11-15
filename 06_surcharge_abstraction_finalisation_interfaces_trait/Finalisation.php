<?php

    // une classe abstraite ne peut pas être instanciée
    // une classe final ne peut pas être héritée
    final class App{

        public function myFunction(){
            echo "action";
        }

    }


    class Application{

        // quand une méthode est final
        // la méthode ne peut pas être surchargée
        final public function myFunction(){
            echo "action 2";
        }

        private function toto(){
            echo "toto";
        }

    }


    class Extension extends Application{

        // ais-je accès ici à toto()?

    }

$test = new Application();
$test->myFunction();


?>