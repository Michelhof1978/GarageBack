<?php
// Aide pour meilleur affichage des descriptions des erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(__ROOT__.'\models\front\prestation_model.php');



class PrestationController {
    private $prestationModel;

    public function __construct() {
        $this->prestationModel = new PrestationModel
    }

    public function getAllPrestations() {
        $prestations = $this->prestationModel->getDBPrestations();
        echo json_encode($prestations);
    }

   
}
?>
