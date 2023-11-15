<?php

    class Home{

        //membres de classes : l'attribut ou la méthode appartient à la classe
        //membres d'instances : l'attribut ou la méthode appartient à l'objet créé

        private static $nbrRooms = 4; //appartient à la classe

        public static $squareMeters = "500m²"; //appartient à la classe
        
        public $color = "white"; //appartient à l'objet
        
        const HEIGHT = "10m"; //appartient à la classe
        
        private $nbrDoors = 10; //appartient à l'objet


        public static function getNbrRooms() { //appartient à la classe
            return self::$nbrRooms;
        }

        public function getNbrDoors() {
            return $this->nbrDoors; //appartient à l'objet
        }

    }

    $home1 = new Home();
    echo "Homme::getNbrRooms " . Home::getNbrRooms(); //appartient à la méthode statique
    echo "<br>Home::HEIGHT " . Home::HEIGHT; //je récupère la constante de la classe HEIGHT


    class Compteur{

        private static $nbrInstance = 0;

        public function __construct() {
            self::$nbrInstance++;
        }

        public static function getNbrInstance() {
            return self::$nbrInstance;
        }

    }

    $nbrCompteurs = array();

    for ($i=0; $i < 10; $i++) { 
        new Compteur();
        array_push($nbrCompteurs, Compteur::getNbrInstance());
    }

    $cnt = 0;
    foreach ($nbrCompteurs as $nbrCompteur) {
        $cnt++;
        echo "<br>";
        echo "Compteur " . $cnt . " : " . $nbrCompteur;
    }

?>