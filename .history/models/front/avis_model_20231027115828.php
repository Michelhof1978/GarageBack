<?php
// Aide pour un meilleur affichage des descriptions d'erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Classe de base pour le modèle
class AvisManager {
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

    public function getDBAvis() {
        return $this->dbh;
    }

    public function getAvisVerifies() {
        $sql = "SELECT * FROM avis WHERE valide = 1"; //Je récupère uniquement les avis à l'état true
        $stmt = $this->dbh->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}


