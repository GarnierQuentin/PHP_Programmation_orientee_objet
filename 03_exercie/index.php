<?php

    // créer une station service
        // avoir un total de litre de dispo
        // une action permettant de faire le plein d'un véhicule

class StationService {

    private $litre_station;
    private $litre_reservoir;
    private $litre_plein;


    // créer un véhicule
        // un reservoir avec une capacité total max
        // le nombre de litre d'essence présent dans le reservoir
    public function __construct($litre_station, $litre_reservoir, $litre_plein) {
        $this->litre_station = $litre_station;
        $this->litre_reservoir = $litre_reservoir;
        $this->litre_plein = $litre_plein;
    }

    // permettre à la voiture de faire le plein dans la station essence
    public function faireLePlein() {
        $this->litre_reservoir = $this->litre_plein;
    }

    // => calculer le nombre de litre à ajouter à la voiture pour avoir un plein
    public function calculerLitre() {
        return $this->litre_plein - $this->litre_reservoir;
    }

    // => diminuer le nombre de litres restant dans la station service
    // en fonction du plein qui aura été fait dans le véhicule
    public function diminuerLitre() {
        $this->litre_station = $this->litre_station - $this->calculerLitre();
    }

    public function getStation() {
        return $this->litre_station;
    }

    public function getReservoir() {
        return $this->litre_reservoir;
    }

    public function setReservoir($litre_reservoir) {
        return $this->litre_reservoir = $litre_reservoir;
    }
}

// station service elle fait 800L
// que votre véhicule il a une capacité totale de 50L
// et que actuellement il a 33L dans son résevoir
$car1 = new StationService(800, 33, 50);

// faudra créer 2-3 véhicules différents
// avec un reservoir différent
// un nombre de litre dans le reservoir différent
$car2 = new StationService(800, 22, 30);
$car3 = new StationService(800, 5, 70);
$car4 = new StationService(800, 7, 7);

// et faire évoluer la capacité restante de la station service
// après chaque plein
$cars = array($car1, $car2, $car3, $car4);

foreach($cars as $car) {
    while($car->getStation() > 0){
        echo "Le réservoir contient " . $car->getReservoir() . " litres <br>";
        $car->diminuerLitre();
        echo "Il reste " . $car->calculerLitre() . " litres à ajouter dans le réservoir <br>";
        echo "Il reste " . $car->getStation() . " litres dans la station <br>";
        $car->faireLePlein();
        echo "Le réservoir est plein <br><br>";
        $car->setReservoir(0);
    }
    echo "------------------------------------------- <br><br>";
}









//CORRECTION

class GazStation {

    private $total;

    public function __construct($total) {
        $this->total = $total;
    }

    public function fillTheThank(Vehicule $vehicule) {

        // j'ai soustrait à ma capacité total de ma station service
        // l'essence que j'ai mis dans mon véhicule
        $this->total -= ($vehicule->getMaxCapacity() - $vehicule->getLiters());

        // faire le plein
        $vehicule->setLiters($vehicule->getMaxCapacity());

    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

}

class Vehicule {

    private $maxCapacity;
    private $liters;

    public function __construct($maxCapacity, $liters) {
        $this->maxCapacity = $maxCapacity;
        $this->liters = $liters;
    }

    public function getMaxCapacity() {
        return $this->maxCapacity;
    }

    public function setMaxCapacity($maxCapacity) {
        $this->maxCapacity = $maxCapacity;
    }

    public function getLiters() {
        return $this->liters;
    }

    public function setLiters($liters) {
        $this->liters = $liters;
    }

}

$station = new GazStation(800);
$vehicule = new Vehicule(50, 25);
$station->fillTheThank($vehicule);
echo "Dans ma station il reste " . $station->getTotal() . "litres <br>";
echo "Mon véhicule a maintenant " . $vehicule->getLiters() . " litres <br>";

$vehicule2 = new Vehicule(70, 15);
$station->fillTheThank($vehicule2);
echo "Dans ma station il reste " . $station->getTotal() . "litres <br>";
echo "Mon véhicule a maintenant " . $vehicule2->getLiters() . " litres <br>";


?>