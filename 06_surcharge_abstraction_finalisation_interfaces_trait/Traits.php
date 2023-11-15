<?php

    // les traits sont une solution à l'héritage multiple

    trait TPanier{

        public $nbProduits = 1;

        public function afficherProduits(){
            echo $this->nbProduits . "<br>";
        }

    }


    trait TMembre{

        public $nbrMembres = 1;

        public function afficherMembres(){
            echo $this->nbrMembres ; "<br>";
        }

    }


    class Ecommerce{

        // c'est comme-ci j'avais hérité de deux classes
        use TPanier, TMembre;

    }

    $site = new Ecommerce;
    $site->afficherMembres();
    $site->afficherProduits();




?>