<?php


    interface Animal2 {

        // no state - no behaviour
        // pas de données - pas de logique
        // que de la déclaration de méthode
        public function parler();
        public function manger();

        public function nourrir();

    }

    // Les méthode qui vont implémenter l'interface
    // devront définir ces méthodes
    // les interfaces sont des contrats
    // qui ont pour objectif de réduire le couplage de classe

    class Chat implements Animal2 {

        public $firstName;
        public $age;

        public function __construct($firstName, $age) {
            $this->firstName = $firstName;
            $this->age = $age;
        }

        public function nourrir() {
            echo "voila des croquettes";
        }

        public function parler() {
            echo "miaox";
        }

        public function manger() {
            echo "je me régale comme un chat !";
        }

    }

    class Tortue implements Animal2 {

        public $firstName;
        public $age;
        public $sexe;

        public function __construct($firstName, $age, $sexe) {
            $this->firstName = $firstName;
            $this->age = $age;
            $this->sexe = $sexe;
        }

        public function nourrir() {
            echo "voila de la salade";
        }

        public function parler() {
            echo "Hey c'est franklin !";
        }

        public function manger() {
            echo "je me régale comme une tortue !";
        }

    }

    class GestionAnimal {

        // gestionAnimal pourra gérer n'importe quelle classe
        // qui implémente Animal2
        public function __construct(Animal2 $animal) {
            $animal->nourrir();
        }

    }

    $chat = new Chat("Felix", 27);
    $tortue = new Tortue("Franklin", 13, "f");
    $gestion = new GestionAnimal($chat);
    $gestion2 = new GestionAnimal($tortue);


    // ici, GestionAnimal attendra en argument 
    // une classe qui implémente Animal2
    // j'ai fait ca pour pouvoir gérer n'importe quel animal
    // et m'assurer que chaque Animal qui implémentera Animal2
    // définisse la méthode nourrir()
    // avec cette architecture, GestionAnimal ne dépends ni de Chat
    // Ni de Tortue
    // mais de l'interface Animal2 qui ne contientpas de logique ni de données
    // donc aucune régression de code possible
    // je peux modifier tortue et Chat comme je le souhaite sans impacter la classe
    // GestionAnimal

    // => on a réduis le couplage de classe

?>