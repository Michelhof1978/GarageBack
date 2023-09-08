<?php

require_once(__ROOT__.'\models\model.php');


class EspaceproManager extends Model {

    public function getVoituresoccasions(){
        $sql = "SELECT * FROM vehicule"; 
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute();
        $voituresoccasions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $voituresoccasions;
    }

    public function deleteDBvehicule($idVehicule) {
        $req = "DELETE * FROM `vehicule` WHERE `idVehicule` = :idVehicule"; // Utilisez le nom correct de la colonne
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idVehicule", $idVehicule, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }
    
    
    

    public function compterVehicule($idVehicule){
        $req = "SELECT COUNT(*) AS nb FROM vehicule WHERE idVehicule = :idVehicule"; // Utilisez le nom correct de la colonne
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idVehicule", $idVehicule, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return ($resultat) ? $resultat['nb'] : 0;
        } else {
            // Gérez l'erreur de la requête de base de données.
            return 0; // Ou gérez-la d'une autre manière appropriée.
        }
    }
    
    
    
    
    
    public function getMessagerie(){
        $sql = "SELECT * FROM messagerie";
       $stmt = $this->getBdd()->prepare($sql);
       $stmt->execute();
       $messagerie = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $stmt->closeCursor();
       return $messagerie;

    }

    public function getAvis(){
        $sql = "SELECT * FROM avis";
       $stmt = $this->getBdd()->prepare($sql);
       $stmt->execute();
       $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $stmt->closeCursor();
       return $avis;
    }

    public function getContenu(){
        $sql = "SELECT * FROM contenu";
       $stmt = $this->getBdd()->prepare($sql);
       $stmt->execute();
       $contenu = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $stmt->closeCursor();
       return $contenu;
    }

    public function getHoraire(){
        $sql = "SELECT * FROM horaire";
       $stmt = $this->getBdd()->prepare($sql);
       $stmt->execute();
       $horaire = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $stmt->closeCursor();
       return $horaire;
    }

    
}