<?php
require_once("models/Model.php");

class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD
    
    // public function getDBVoiturefiche(){
    //     $req = "SELECT * FROM vehicule";
    //     $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
    //       $stmt->execute();//Exécution de la requête
    //          $voiturefiche = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $voiturefiche
    //      $stmt->closeCursor();//On ferme le curseur
    //      return empty($voiturefiche) ? [] : $voiturefiche;//J ai rajouté empty pour dire que si pad de données, ça nous renvoie quand même un tableau vide, cela peut éviter certaines erreurs
    //      }

        public function getVoiturefiche($filtres = []) {
            $req = "SELECT * FROM vehicule WHERE 1=1";
    
            if(isset($filtres['marque']) && $filtres['marque'] !== '') {
                $req .= " AND marque = :marque";
            }
            if(isset($filtres['modele']) && $filtres['modele'] !== '') {
                $req .= " AND modele = :modele";
            }
            if(isset($filtres['annee']) && $filtres['annee'] !== '') {
                $req .= " AND annee = :annee";
            }
    
            // ... Ajoutez d'autres conditions ici ...
    
            $stmt = $this->getBdd()->prepare($req);
    
            if(isset($filtres['marque']) && $filtres['marque'] !== '') {
                $stmt->bindParam(":marque", $filtres['marque']);
            }
            if(isset($filtres['modele']) && $filtres['modele'] !== '') {
                $stmt->bindParam(":modele", $filtres['modele']);
            }
            if(isset($filtres['annee']) && $filtres['annee'] !== '') {
                $stmt->bindParam(":annee", $filtres['annee']);
            }
    
            // ... Liez d'autres paramètres ici ...
    
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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


