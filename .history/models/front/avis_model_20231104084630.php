<?php
// Aide pour un meilleur affichage des descriptions d'erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

class AvisManager extends Model {
    private $dbh;

    public function __construct() {
        M::__construct(); // Appeler le constructeur de la classe parente (Model)

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
        $sql = "SELECT * FROM avis WHERE valide = 1"; // Je récupère uniquement les avis à l'état true
        $stmt = $this->dbh->query($sql); // Utiliser $this->dbh au lieu de $this->dbh()
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    }
    
    public function enregistrerAvis($nom, $prenom, $note, $commentaire) {
        $sql = "INSERT INTO avis (nom, prenom, note, commentaire, created_at, updated_at, garage_idGarage) VALUES (?, ?, ?, ?, NOW(), NOW(), 1)";
        $stmt = $this->dbh->prepare($sql);
    
        try {
            $stmt->execute([$nom, $prenom, $note, $commentaire]);
            return true; // Retourne true en cas de succès
        } catch (PDOException $e) {
            // Gère l'erreur en affichant un message d'erreur (vous pouvez personnaliser ce message)
            echo "Erreur d'enregistrement de l'avis : " . $e->getMessage();
            return false; // Retourne false en cas d'échec
        }
    }
}
