<?php
require_once("models/Model.php");

class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD
    
    public function getDBVoiturefiche() {
        $req = "SELECT * FROM vehicule";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $voiturefiche = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $voiturefiche; // Retourne toutes les données des véhicules
    }
    
    
    
    

    public function getDBPrestations(){
        $req = "SELECT * FROM prestation";
        $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
        $stmt->execute();//Exécution de la requête
            $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $prestations
        $stmt->closeCursor();//On ferme le curseur
        return empty($prestations) ? [] : $prestations;
        }
        
        public function getDBAvis(){
            $req = "SELECT * FROM avis";
            $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
            $stmt->execute();//Exécution de la requête
                $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $prestations
            $stmt->closeCursor();//On ferme le curseur
            return empty($avis) ? [] : $avis;
            }

            public function getDBContact(){
                $req = "SELECT * FROM contactform";
                $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
                $stmt->execute();//Exécution de la requête
                    $contact = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $prestations
                $stmt->closeCursor();//On ferme le curseur
                return empty($contact) ? [] : $contact;
                }

                // public function getDBGarage(){
                // $req = "SELECT * FROM garage";
                // $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
                // $stmt->execute();//Exécution de la requête
                //     $garage = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // $stmt->closeCursor();//On ferme le curseur
                // return empty($garage) ? [] : $garage;
                // }
}


