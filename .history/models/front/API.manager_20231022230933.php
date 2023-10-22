<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("models/Model.php");

class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD

   
        
      
        
        

            // public function getDBContact(){
            //     $req = "SELECT * FROM contactform";
            //     $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
            //     $stmt->execute();//Exécution de la requête
            //         $contact = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $prestations
            //     $stmt->closeCursor();//On ferme le curseur
            //     return empty($contact) ? [] : $contact;
            //     }

              
}



<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("models/Model.php");

class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD

        public function getVoitureFilters($filtres = []) {
            $req = "SELECT * FROM vehicule WHERE 1=1";
    
            if(isset($filtres['marque']) && $filtres['marque'] !== '') {
                $req .= " AND marque = :marque";
            }
            if(isset($filtres['famille']) && $filtres['famille'] !== '') {
                $req .= " AND famille = :famille";
            }
            if(isset($filtres['annee']) && $filtres['annee'] !== '') {
                $req .= " AND annee = :annee";
            }
            if(isset($filtres['kilometrage']) && $filtres['kilometrage'] !== '') {
                $req .= " AND kilometrage = :kilometrage";

            }
    
          
    
            $stmt = $this->getBdd()->prepare($req);
    
            if(isset($filtres['marque']) && $filtres['marque'] !== '') {
                $stmt->bindParam(":marque", $filtres['marque']);
            }
            if(isset($filtres['famille']) && $filtres['famille'] !== '') {
                $stmt->bindParam(":famille", $filtres['famille']);
            }
            if(isset($filtres['annee']) && $filtres['annee'] !== '') {
                $stmt->bindParam(":annee", $filtres['annee']);
            }
    
            if(isset($filtres['kilometrage']) && $filtres['kilometrage'] !== '') {
                $stmt->bindParam(":kilometrage", $filtres['kilometrage']);
            }
    
            $stmt->execute();
    
            $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Ajouter le lien à chaque entrée du tableau
    foreach ($resultats as &$vehicule) {
        // Récupérer le lien depuis la colonne 'lien' de la table
        $lien = $this->getLinkFromDatabase($vehicule['idVehicule']); // Remplacez 'getLinkFromDatabase' par le nom de votre fonction pour obtenir le lien de la base de données
        $vehicule['lien'] = $lien;
    }

    return $resultats;
}
        

//AFFICHAGE DES IMAGES
public function getLinkFromDatabase($idVehicule) {
    $req = "SELECT imageVoiture FROM vehicule WHERE idVehicule = :idVehicule";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindParam(":idVehicule", $idVehicule);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['imageVoiture'];
}



        public function getVehiculeDetails($id) {
            $req = "SELECT * FROM vehicule WHERE idVehicule = :id";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    

    public function getDBPrestations(){
        $req = "SELECT * FROM prestation";
        $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
        $stmt->execute();//Exécution de la requête
            $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $prestations
        $stmt->closeCursor();//On ferme le curseur
        return empty($prestations) ? [] : $prestations;
        }


        //AV
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

            public function getDBContact(){
                $req = "SELECT * FROM contactform";
                $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
                $stmt->execute();//Exécution de la requête
                    $contact = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $prestations
                $stmt->closeCursor();//On ferme le curseur
                return empty($contact) ? [] : $contact;
                }

                public function getDBGarage(){
                $req = "SELECT * FROM garage";
                $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
                $stmt->execute();//Exécution de la requête
                    $garage = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();//On ferme le curseur
                return empty($garage) ? [] : $garage;
                }
}




