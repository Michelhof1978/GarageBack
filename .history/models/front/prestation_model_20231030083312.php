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
            http_response_code(500); // Code d'erreur interne du serveur
            echo json_encode(['error' => 'Erreur de connexion à la base de données : ' . $e->getMessage()]);
            exit;
        }
    }
    

    public function getAllPrestations() {
        $sql = "SELECT * FROM prestation";
    
        try {
            $stmt = $this->dbh->query($sql);
            $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($prestations);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur de récupération des prestations : ' . $e->getMessage()]);
        }
    }
    
}

// Créez une instance de la classe PrestationModel
$prestationModel = new PrestationModel();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $prestations = $prestationModel->getAllPrestations();

    // Utilisez un en-tête pour indiquer que la réponse est au format JSON
    header('Content-Type: application/json');

    echo json_encode($prestations); // Utilisez echo ici
}
?>
