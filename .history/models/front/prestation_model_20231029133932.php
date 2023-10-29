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

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Requête SQL pour récupérer toutes les prestations
        $sql = "SELECT * FROM prestation";
        
        try {
            $stmt = $pdo->query($sql);
            $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($prestations);
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Erreur de récupération des prestations : ' . $e->getMessage()]);
        }
    }
}
?>
