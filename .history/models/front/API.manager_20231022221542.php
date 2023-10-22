<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("models/Model.php");

class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD

   
        
        public function insertAvisIntoDatabase($nom, $prenom, $note, $commentaire) {
            try {
                $req = "INSERT INTO avis (nom, prenom, note, commentaire, created_at, updated_at, garage_idGarage) VALUES (?, ?, ?, ?, NOW(), NOW(), 1)";
                $stmt = $this->getBdd()->prepare($req);
                $stmt->execute([$nom, $prenom, $note, $commentaire]);
                return true;
            } catch (PDOException $e) {
                // Gérer les erreurs, par exemple, en journalisant l'erreur.
                // Vous pouvez également lancer une nouvelle exception ou renvoyer un message d'erreur.
                return false;
            }
        }
        
        

            /
              
}




