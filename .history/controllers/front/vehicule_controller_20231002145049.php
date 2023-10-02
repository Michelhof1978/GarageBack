<?php //
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(__ROOT__.'\models\front\vehicule_model.php');


//contrôleur qui va manipuler les données de véhicules dans l'application. Elle utilisera un modèle (VehiculeModel) pour accéder aux données et gérer les opérations liées aux véhicules. 
// Création du controlleur du côté front qui va regrouper toutes nos routes
class VehiculeController
{
    //Crérera automatiquement une instance de classe APIManager et la stockera ds la propriété $apiManager. Cela sera utile pour gérer le JSON par la suite.
    private $apiManager; //propriété privée (accessible uniquement à l'intérieur de cette classe) qui va contenir une instance de la classe APIManager.

    public function __construct()
    {
        $this->apiManager = new VehiculeModel();
    }

    public function getCarsByFilters($filtres)
    {
        $cars = $this->apiManager->getCarsByFilters($filtres);
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        echo json_encode($cars);
    }
}
