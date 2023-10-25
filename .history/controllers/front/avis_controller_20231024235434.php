<?php

require_once(__ROOT__.'\models\back\admin_manager.php');

$adminManager = new AdminManager();

class AvisController {
    private $adminManager; // Assurez-vous d'initialiser cette propriété correctement

    public function __construct($adminManager) {
        $this->adminManager = $adminManager;
    }

    public function enregistrerAvis() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $note = $_POST['note'];
            $commentaire = $_POST['commentaire'];

            // Validation des données (ajoutez vos propres règles de validation)
            if (empty($nom) || empty($prenom) || empty($note) || empty($commentaire)) {
                echo "Tous les champs sont obligatoires.";
                return;
            }

            if (!is_numeric($note) || $note < 0 || $note > 5) {
                echo "La note doit être un nombre entre 0 et 5.";
                return;
            }

            // Insertion dans la base de données
            $result = $this->insertAvisIntoDatabase($nom, $prenom, $note, $commentaire);

            if ($result) {
                // Avis enregistré avec succès, redirigez l'utilisateur vers une page de confirmation.
                header("Location: /confirmation");
                return;
            } else {
                // Gestion des erreurs : affichez un message d'erreur à l'utilisateur.
                echo "Une erreur s'est produite lors de l'enregistrement de l'avis.";
            }
        }
    }

    public function getAvis() {
        try {
            $pdo = $this->adminManager->getDBAvis(); // Utilisez votre méthode getDBAvis pour obtenir la connexion PDO.
            $sql = "SELECT * FROM avis";
            $stmt = $pdo->query($sql);
            $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Vous pouvez faire quelque chose avec les avis, par exemple les afficher.
            foreach ($avis as $avi) {
                echo "Nom : " . $avi['nom'] . "<br>";
                echo "Note : " . $avis['note'] . "<br>";
                echo "Note : " . $avis['note'] . "<br>";
                echo "Note : " . $avis['note'] . "<br>";
                
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données.
            echo "Une erreur s'est produite lors de la récupération des avis.";
        }
    }

    private function insertAvisIntoDatabase($nom, $prenom, $note, $commentaire) {
        try {
            $pdo = $this->adminManager->getDBAvis(); // Utilisez votre méthode getDBAvis pour obtenir la connexion PDO.
            $sql = "INSERT INTO avis (nom, prenom, note, commentaire, created_at, updated_at, garage_idGarage) VALUES (?, ?, ?, ?, NOW(), NOW(), 1)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $note, $commentaire]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

