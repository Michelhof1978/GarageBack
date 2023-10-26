<?php
require_once(__ROOT__.'/models/back/avis_manager.php'); 

class AvisController {
    private $avisManager; 
    public function __construct($avisManager) {
        $this->avisManager = $avisManager;
    }

    public function enregistrerAvis() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $note = $_POST['note'];
            $commentaire = $_POST['commentaire'];

            
            if (empty($nom) || empty($prenom) || empty($note) || empty($commentaire)) {
                echo "Tous les champs sont obligatoires.";
                return;
            }

            if (!is_numeric($note) || $note < 0 || $note > 5) {
                echo "La note doit être un nombre entre 0 et 5.";
                return;
            }

           
            $result = $this->insertAvisBDD($nom, $prenom, $note, $commentaire);

            if ($result) {
                // Avis enregistré avec succès, redirection vers 
                header("Location: /confirmation");
                return;
            } else {
                echo "Une erreur s'est produite lors de l'enregistrement de l'avis.";
            }
        }
    }

    public function getAvis() {
        try {
            $pdo = $this->avisManager->getDBAvis(); 
            $sql = "SELECT * FROM avis";
            $stmt = $pdo->query($sql);
            $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);

          
            foreach ($avis as $avi) {
                echo "Nom : " . $avi['nom'] . "<br>";
                echo "Prénom : " . $avi['prenom'] . "<br>";
                echo "Note : " . $avi['note'] . "<br>";
                echo "Commentaire: " . $avi['commentaire'] . "<br>";
            }
        } catch (PDOException $e) {
           
            echo "Une erreur s'est produite lors de la récupération des avis.";
        }
    }

    private function insertAvisBDD($nom, $prenom, $note, $commentaire) {
        try {
            $pdo = $this->avisManager->getDBAvis();
            $sql = "INSERT INTO avis (nom, prenom, note, commentaire, created_at, updated_at, garage_idGarage) VALUES (?, ?, ?, ?, NOW(), NOW(), 1)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $note, $commentaire]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}