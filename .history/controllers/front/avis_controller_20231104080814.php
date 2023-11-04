<?php

require_once(__ROOT__.'/models/front/avis_model.php');

class AvisController {
    private $avisManager; 

    public function __construct($avisManager) {
        $this->avisManager = $avisManager;
    }

    public function enregistrerAvis($data) {
        $nom = $data["nom"];
        $prenom = $data["prenom"];
        $note = $data["note"];
        $commentaire = $data["commentaire"];
    
        if (empty($nom) || empty($prenom) || empty($note) || empty($commentaire)) {
            http_response_code(400);
            echo json_encode(["error" => "Tous les champs sont obligatoires."]);
            return;
        }
    
        if (!is_numeric($note) || $note < 0 || $note > 5) {
            http_response_code(400);
            echo json_encode(["error" => "La note doit être un nombre entre 0 et 5."]);
            return;
        }
    
        $result = $this->insertAvisBDD($nom, $prenom, $note, $commentaire);
    
        if ($result) {
            // Avis enregistré avec succès, renvoyer une réponse JSON
            http_response_code(200);
            echo json_encode(["success" => "Avis enregistré avec succès."]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Une erreur s'est produite lors de l'enregistrement de l'avis."]);
        }
    }
    

    public function getAvisVerifies() {
        try {
            $pdo = $this->avisManager->getDBAvis(); 
            $sql = "SELECT * FROM avis WHERE valide = 1"; // Ne récupère que les avis validés
            $stmt = $pdo->query($sql);
            $avisData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            header('Content-Type: application/json');
            echo json_encode($avisData);
        } catch (PDOException $e) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Une erreur s\'est produite lors de la récupération des avis.']);
        }
    }

    private function insertAvisBDD($nom, $prenom, $note, $commentaire) {
        try {
            $pdo = $this->avisManager->getDBAvis();
            $sql = "INSERT INTO avis (nom, prenom, note, commentaire, created, date_modification, valide) VALUES (?, ?, ?, ?, NOW(), NOW(), 1)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $note, $commentaire]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>

