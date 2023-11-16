<?php

class Character{
    // nom
    // billes
    // gagner
    // perdre

    private $name;
    private $balls;

    public function __construct($name, $balls){
        $this->name = $name;
        $this->balls = $balls;
    }

    public function getName(){
        return $this->name;
    }

    public function getBalls(){
        return $this->balls;
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

    public function __construct($bonus, $malus, $name, $balls){
        $this->bonus = $bonus;
        $this->malus = $malus;

        // J'appelle le constructerur de la classe parente
        parent::__construct($name, $balls);
    }


    function checkPairOrNot($pairOrNot){
        if($pairOrNot == 0){
            return true;
        }else{
            return false;
        }
    }


    function pairOuImpair(){
        $choosePairOrNot = Utils::generateRandomNumber(0, 1);
        return $this->checkPairOrNot($choosePairOrNot);
    }


    function tricherOuPas(){
        $tricher = Utils::generateRandomNumber(0, 1);
        if($tricher == 0){
            return true;
        }else{
            return false;
        }
    }


    function getBonus(){
        return $this->bonus;
    }


    function getMalus(){
        return $this->malus;
    }
}



class Enemy extends Character{
    // age

    private $age;

    public function __construct($age, $name, $balls){
        $this->age = $age;

        // J'appelle le constructerur de la classe parente
        parent::__construct($name, $balls);
    }

    public function getAge(){
        return $this->age;
    }
}

?>