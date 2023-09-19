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

    public function GETDeleteDBvehicule(){
        $sql = "DELETE FROM vehicule WHERE idVehicule = :idVehicule";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->bindValue(":idVehicule", $idVehicule, PDO::PARAM_INT); //on confirme bien ici que c'est bien un entier que l'on veut récupérer
        $stmt->execute();
        $stmt->closeCursor();
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