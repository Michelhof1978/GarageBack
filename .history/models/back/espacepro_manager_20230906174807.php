<?php

require_once(__ROOT__.'\models\model.php');
// require_once(__ROOT__.'\datagestion\vehicule_data.php');

class EspaceproManager extends Model {

        public function getVehicules() {
            $sql = "SELECT idVehicule, famille, marque, modele, annee, kilometrage, boitevitesse, energie, datecirculation, puissance, places, couleur, description, prix FROM vehicule";
            $stmt = $this->getBdd()->prepare($sql);
            $stmt->execute();
            $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (!$vehicules) {
                return [];
            }
    
            $stmt->closeCursor();
            return $vehicules;
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
