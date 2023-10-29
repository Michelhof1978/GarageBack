<?php
// Aide pour un meilleur affichage des descriptions d'erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

class PrestationModel {
    private $dbh;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=garage;charset=utf8';
        $user = 'root';
        $password = '';

        try {
            $this->dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    public function getDBPrestation() {
        return $this->dbh;
    }

}
