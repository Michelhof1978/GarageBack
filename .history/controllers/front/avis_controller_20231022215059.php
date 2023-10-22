<?php

require_once(__ROOT__.'\models\back\admin_manager.php');
class AvisController {
    public function enregistrerAvis() {
        // Récupérer les données du formulaire (nom, prénom, note, commentaire, etc.)
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $note = $_POST['note'];
        $commentaire = $_POST['commentaire'];

        // Insérez ces données dans la base de données (remplacez ceci par votre propre logique)
        $result = $this->insertAvisIntoDatabase($nom, $prenom, $note, $commentaire);

        if ($result) {
            // Avis enregistré avec succès, redirigez l'utilisateur vers une page de confirmation ou une autre vue.
            header("Location: /confirmation");
        } else {
            // Gestion des erreurs : affichez un message d'erreur à l'utilisateur.
            echo "Une erreur s'est produite lors de l'enregistrement de l'avis.";
        }
    }

    private function insertAvisIntoDatabase($nom, $prenom, $note, $commentaire) {
        INSERT INTO avis (nom, prenom, commentaire, note, created_at, updated_at, garage_idGarage)
VALUES ('Nom de l'utilisateur', 'Prénom de l'utilisateur', 'Contenu du commentaire', 4.5, NOW(), NOW(), 1);

        try {
            $pdo = new PDO("mysql:host=hostname;dbname=dbname", "username", "password");
            $sql = "INSERT INTO avis (nom, prenom, note, commentaire) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $note, $commentaire]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

