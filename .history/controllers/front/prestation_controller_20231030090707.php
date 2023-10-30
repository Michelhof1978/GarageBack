<?php
// PrestationController.php

class PrestationController {
    private $apiManager;

    public function __construct($dbh) {
        $this->apiManager = new PrestationModel($dbh);
    }

    public function getAPIPrestation() {
        $prestation = $this->apiManager->getAllPrestations();

        // Configurez les entêtes avant d'envoyer la réponse
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");

        echo json_encode($prestation);
    }
}
