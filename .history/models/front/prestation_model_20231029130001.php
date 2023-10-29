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

   

// Exécution de la requête SQL pour récupérer des données
$sql = "SELECT * FROM prestation";
$stmt = $dbh->query($sql);
$prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des données récupérées
if (count($prestations) > 0) {
    echo "<h1>Liste des Prestations :</h1>";
    echo "<ul>";
    foreach ($prestations as $prestation) {
        echo "<li>{$prestation['nom']}</li>";
    }
    echo "</ul>";
} else {
    echo "Aucune prestation trouvée.";
}
?>
