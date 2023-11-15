<?php

// créer une classe Humain
// prenom
// nom
// sexe
// adresse

class Humain {

    // initialiser la valeurs de ces champs/attributs lorsque j'instancie
    // la classe Humain (constructeur)

    private $firstname;

    private $lastname;

    private $gender;

    private $address;

    // constructeur
    // permet d'initialiser des valeurs
    // pour nos champs
    public function __construct($firstname, $name, $gender, $address){
        $this->firstname = $firstname;
        $this->lastname = $name;
        $this->gender = $gender;
        $this->address = $address;
    }

    // méthode qui permette de se présenter (salut je m'appel Allia, j'ai 20 ans et je vis au Plessis-Robinson)

    public function sePresenter() {
        echo "Salut, je m'appel $this->firstname $this->lastname, et j'habite $this->address";
    }

    // ensuite je veux encapsuler mes attributs avec des getter et des setter

    // encapsulation
    // le fait de rendre privé des attributs ou des méthodes

    // Les attributs sont toujours privés
    // Les méthodes sont privées lorsqu'elles font partie du détail de l'implémentation du code (l'intérieur de la télécommande)
    public function getFirstName() {
        return $this->firstname;
    }

    public function getLastName() {
        return $this->lastname;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getaddress() {
        return $this->address;
    }

    public function setFirstName($firstname) {
        return $this->firstname = $firstname;
    }

    public function etLastName($lastname) {
        return $this->lastname = $lastname;
    }

    public function etGender($gender) {
        return $this->gender = $gender;
    }

    public function etaddress($address) {
        return $this->address = $address;
    }
}

// ensuite créer une liste de personne (au moins 5)
// et faire en sorte que chaque personne se présente chacun son tour

// Pour sécuriser notre code
// qui peut accéder aux valeurs des propriétés
// quelles valeurs on peut setter à l'intérieur
// je passe par des méthodes intermédiaires
// getter/setter
$list_people = [$quentin = new Humain('Quentin', 'Garnier', 'Homme', 'Châtillon'),
                $thomas = new Humain('Thomas', 'Candille', 'Homme', 'Clamart'),
                $marianne = new Humain('Marianne', 'Rippe', 'Femme', 'Loin'),
                $michel = new Humain('Michel', 'Moccand', 'Homme', 'presque Nanterre')];

//$quentin->setFirstName('Quentin');
foreach ($list_people as $person) {
    $person->sePresenter();
    echo '<br>';
}


?>