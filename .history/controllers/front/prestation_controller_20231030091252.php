<?php
// Aide pour meilleur affichage des descriptions des erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(__ROOT__.'\models\front\prestation_model.php');

<?php
// PrestationController.php

require_once(__ROOT__ . '/models/PrestationModel.php');

class PrestationController {
    private $prestationModel;

    public function __construct() {
        $this->prestationModel = new PrestationModel(/* passez votre objet de base de données (dbh) ici */);
    }

    public function getAllPrestations() {
        $prestations = $this->prestationModel->getAllPrestations();
        echo json_encode($prestations);
    }

    // Vous pouvez ajouter d'autres méthodes pour gérer les demandes API spécifiques ici
}
?>
