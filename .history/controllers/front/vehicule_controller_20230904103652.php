<?php //CONTROLLER

require_once("");
require_once(__ROOT__.'\controllers\front\vehicule_controller.php');



// Création du controlleur du côté front qui va regrouper toutes nos routes
class VehiculeController{
    //Crérera automatiquement une instance de classe APIManager et la stockera ds la propriété $apiManager. Cela sera utile pour gérer le JSON par la suite.
    private $apiManager;//propriété privée (accessible uniquement à l'intérieur de cette classe) qui va contenir une instance de la classe APIManager.

    public function __construct(){
        $this->apiManager = new VehiculeModel();
    }

public function getCarsByFilters($filtres){
    $cars=$this->apiManager->getCarsByFilters($filtres);
    header('Content-Type: application/json');
        echo json_encode($cars);
}



}