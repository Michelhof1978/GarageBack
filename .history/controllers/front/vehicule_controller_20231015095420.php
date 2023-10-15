<?php
// Aide pour meilleur affichage des descriptions des erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(__ROOT__.'\models\front\vehicule_model.php');

class VehiculeController
{
    private $apiManager;

    public function __construct()
    {
        $this->apiManager = new VehiculeModel();
    }

    public function getCarsByFilters($filtres)
    {
       

       
        $cars = $this->apiManager->getCarsByFilters($filtres);
       

          //Configurez les entêtes avant d'envoyer la réponse
           header('Content-Type: application/json');
           header("Access-Control-Allow-Origin: http://localhost:3000");
           header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
           header("Access-Control-Allow-Headers: Content-Type");
          
        //    echo json_encode($cars);
        }
    
}
