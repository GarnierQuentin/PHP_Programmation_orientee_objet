<?php 


class Humains { // pascal naming convention

    // public : access modifier
    // modificateur d'accès
    // visibilité sur l'attribut
    // par défaut public : je peux avoir accès à la méthode/attribut en dehors de la classe
    // private : je n'y ai accès que dans la classe
    // protected : j'y ai accès dans la classe et dans les classes filles
    public $firstname;

    public $anualIncome;

    public function sePresenter() { //methode
        echo "Salut, je m'appel $this->firstname";
    }

    private function faireSesDevoirs() {
        echo 'Je fais mes devoirs';
    }

    public function payerImpots() {
        return $this->calculerMesImots();
    }

    private function calculerMesImots() {
        if ($this->anualIncome > 50000) {
            return $this->anualIncome * 0.35;
        }
        else if ($this->anualIncome > 20000) {
            return $this->anualIncome * 0.45;
        }
        else {
            return $this->anualIncome * 0.25;
        }
    }

}

$quentin = new Humains(); // on a créé un objet à partir de l'instance d'une classe

// je définis une valeur pour la propritété firstname
$quentin->firstname = 'Quentin';
$quentin->sePresenter();

echo '<br>';

$thomas = new Humains();
$thomas->firstname = 'Thomas';
$thomas->sePresenter();
$thomas->anualIncome = 60000;
echo '<br>';
echo "Thomas va payer " . $thomas->payerImpots() . " € d'impots.";
// $thomas->faireSesDevoirs(); // erreur car la méthode est privée



echo '<pre>';
var_dump($quentin);
echo '</pre>';

// fonction pré-définie get_class_methods
// lister les méthodes d'une classe
var_dump(get_class_methods('Humains'))

?>