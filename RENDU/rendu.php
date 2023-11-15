<?php 


class Game{
    // gérer héros
    // gérer ennemis
    // gérer les rencontres
    // lance les combats
    // méthode qui permet de rejouer
    // choix heros
    // choix de la difficulté

    private $hero;
    private $enemy;

    public function __construct(){
        $this->hero = new Hero(1, 2, 1, "pair", "Seong", "Gi-hun", 2, 2);
        $this->enemy = array();
    }

    public function generateHero($character){
        $list_of_characters = [
            [],
            [],
            []
        ];
    }

    public function generateEnemies($difficulty){
        $amount_of_enemies = array(5, 10, 20);
        $list_of_difficulties = array("Facile", "Moyen", "Difficile");
        echo "<br> Difficulté de la partie : " . $list_of_difficulties[$difficulty] . "<br>";

        for ($i=0; $i < $amount_of_enemies[$difficulty]; $i++) { 
            $this->enemy[$i] = new Enemy(70, "Test", 13, 2, 2);
        }

        var_dump($this->enemy);
    }

}


class Character{
    // nom
    // billes
    // gagner
    // perdre

    private $name;
    private $balls;
    private $win;
    private $lose;

    public function __construct($name, $balls, $win, $lose){
        $this->name = $name;
        $this->balls = $balls;
        $this->win = $win;
        $this->lose = $lose;
    }

    public function getName(){
        return $this->name;
    }

    public function getBalls(){
        return $this->balls;
    }

    public function getWin(){
        return $this->win;
    }

    public function getLose(){
        return $this->lose;
    }

    public function setBalls($balls){
        $this->balls = $balls;
    }
}


class Hero extends Character{
    // bonus
    // malus
    // tricher (publique)
    // choisir pair ou impair (publique) (appelle la méthode check ou impair)
    // check pair ou impair 

    private $bonus;
    private $malus;
    public $tricher;
    public $choosePairOrNot;

    public function __construct($bonus, $malus, $tricher, $choosePairOrNot, $name, $balls, $win, $lose){
        $this->bonus = $bonus;
        $this->malus = $malus;
        $this->tricher = $tricher;
        $this->choosePairOrNot = $choosePairOrNot;

        // J'appelle le constructerur de la classe parente
        parent::__construct($name, $balls, $win, $lose);

        function checkPairOrNot($choosePairOrNot){
            if($choosePairOrNot == "pair"){
                return true;
            }else{
                return false;
            }
        }
    }
}



class Enemy extends Character{
    // age

    private $age;

    public function __construct($age, $name, $balls, $win, $lose){
        $this->age = $age;

        // J'appelle le constructerur de la classe parente
        parent::__construct($name, $balls, $win, $lose);
    }
}



abstract class Utils{
    //static generateRandomNumber (min, max)

    public static function generateRandomNumber($min, $max){
        return rand($min, $max);
    }
}

$difficulty = Utils::generateRandomNumber(0, 2);
$game = new Game();
$game->generateEnemies($difficulty);



?>