<?php
// Contrôleur pour la gestion des demandes GET pour la table "prestation"

require_once 'PrestationModel.php'; // Inclure le modèle PrestationModel

class PrestationController {
    private $prestationModel;

    public function __construct() {
        $this->prestationModel = new PrestationModel();
    }

    public function getAllPrestations() {
        $prestations = $this->prestationModel->getAllPrestations();
        header('Content-Type: application/json');
        echo json_encode($prestations);
    }
}

// Créer une instance du contrôleur
$prestationController = new PrestationController();

// Gérer la demande GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $prestationController->getAllPrestations();
}
?>
