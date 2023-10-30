<?php
// PrestationModel.php

class PrestationModel {
    private $dbh;

    public function __construct() {
        // Configuration de la base de données
        $db_host = "localhost"; // Adresse de votre serveur MySQL
        $db_name = "garage"; // Nom de votre base de données
        $db_user = "root"; // Nom d'utilisateur MySQL
        $db_pass = ""; // Mot de passe MySQL

        try {
            // Créez une connexion PDO avec votre base de données
            $this->dbh = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Gérez les erreurs de connexion à la base de données ici
            http_response_code(500);
            echo json_encode(["error" => "Erreur de connexion à la base de données"]);
            exit;
        }
    }

    public function getDBPrestations() {
        $stmt = $this->dbh->prepare('SELECT * FROM prestation');
        $stmt->execute();
        $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $prestations;
    }
}
