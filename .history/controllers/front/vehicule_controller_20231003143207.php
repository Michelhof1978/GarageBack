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
       

        // Effectuez votre traitement et envoyez la réponse JSON
        $cars = $this->apiManager->getCarsByFilters($filtres);
        echo json_encode($cars);
    }
}
