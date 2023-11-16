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


    public function generateHero(){
        $list_of_characters = [
            [1, 2, "Seong Gi-hun", 15],
            [2, 1, "Kang Sae-byeok", 25],
            [3, 0, "Cho Sang-woo", 35]
        ];

        $chooseHeroe = Utils::generateRandomNumber(0, 2);

        $this->hero = new Hero($list_of_characters[$chooseHeroe][0], $list_of_characters[$chooseHeroe][1], $list_of_characters[$chooseHeroe][2], $list_of_characters[$chooseHeroe][3]);
        echo "Vous avez choisi le personnage : " . $this->hero->getName() . "<br>";
    }

    public function generateEnemies($difficulty){
        $amount_of_enemies = array(5, 10, 20);
        $list_of_difficulties = array("Facile", "Moyen", "Difficile");
        echo "<br> Difficulté de la partie : " . $list_of_difficulties[$difficulty] . "<br>";

        for ($i=0; $i < $amount_of_enemies[$difficulty]; $i++) { 
            $age = Utils::generateRandomNumber(0, 100);
            $enemyBalls = Utils::generateRandomNumber(1, 20);
            $this->enemy[$i] = new Enemy($age, "Enemy", $enemyBalls);
        }

    }


    public function startGame(){
        $difficulty = Utils::generateRandomNumber(0, 2);
        $this->generateHero();
        $this->generateEnemies($difficulty);

        echo "<br>";

        for ($i=0; $i < count($this->enemy) && $this->hero->getBalls() > 0; $i++) { 
            echo "Vous avez rencontré un ennemi qui a " . $this->enemy[$i]->getAge() . " ans et " . $this->enemy[$i]->getBalls() . " billes <br>";
            $this->hero->tricher = $this->hero->tricherOuPas();
            if ($this->enemy[$i]->getAge() >= 70 && $this->hero->tricher == true) {
                echo "Vous choisissez de tricher ! <br>";
                $this->hero->setBalls($this->hero->getBalls() + $this->enemy[$i]->getBalls());
                $this->enemy[$i]->setBalls(0);
                echo "Vous avez maintenant " . $this->hero->getBalls() . " billes <br>";
            }
            else{
                $heroPairOrNot = $this->hero->pairOuImpair();

                if ($this->enemy[$i]->getBalls() % 2 == 0) {
                    $enemyPairOrNot = true;
                }
                else{
                    $enemyPairOrNot = false;
                }

                if ($heroPairOrNot === $enemyPairOrNot) {
                    echo "Vous avez gagné ! <br>";
                    $this->hero->setBalls($this->hero->getBalls() + $this->enemy[$i]->getBalls() + $this->hero->getBonus());
                    $this->enemy[$i]->setBalls(0);
                    echo "Vous avez maintenant " . $this->hero->getBalls() . " billes <br>";
                }
                else{
                    echo "Vous avez perdu ! <br>";
                    $this->hero->setBalls($this->hero->getBalls() - $this->enemy[$i]->getBalls() - $this->hero->getMalus());
                    if ($this->hero->getBalls() > 0) {
                        echo "Vous avez maintenant " . $this->hero->getBalls() . " billes <br>";
                    }
                }
            }
            echo "<br>";
        }
    }
}

?>