<?php //CONTROLLER
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');



require_once(__ROOT__.'\models\front\vehicule_model.php');

// Création du controlleur du côté front qui va regrouper toutes nos routes
class VehiculeController{
    //Crérera automatiquement une instance de classe APIManager et la stockera ds la propriété $apiManager. Cela sera utile pour gérer le JSON par la suite.
    private $apiManager;//propriété privée (accessible uniquement à l'intérieur de cette classe) qui va contenir une instance de la classe APIManager.

    public function __construct(){
        $this->apiManager = new VehiculeModel();
    }

F
        echo json_encode($cars);
}




}