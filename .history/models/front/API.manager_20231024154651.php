
<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("models/Model.php");


class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD


    //VEHICULE MANAGER
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
        

 /////VISUALISATION VEHICULE
    public function getVoituresoccasions(){
        $sql = "SELECT idVehicule, imageVoiture, famille, marque, modele, 
                DATE_FORMAT(datecirculation, '%d-%m-%Y') AS datecirculation, 
                DATE_FORMAT(created_at, '%d-%m-%Y') AS created_at
                annee, kilometrage, boitevitesse, energie, puissance, places, couleur, description, prix, imageCritere, created_at
                FROM vehicule";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute();
        $voituresoccasions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $voituresoccasions;
    }
    

    ////////SUPPRESSION VEHICULE
    public function deleteDBvehicule($idVehicule) {
        try {
            $req = "DELETE FROM `vehicule` WHERE `idVehicule` = :idVehicule";//Supprimera l'id véhicule de la table véhicule
            $stmt = $this->getBdd()->prepare($req);//préapare requête sql
            //La méthode bindValue est utilisée pour lier la valeur de :idVehicule avec la valeur de $idVehicule
            $stmt->bindValue(":idVehicule", $idVehicule, PDO::PARAM_INT);//Ne pas oublier de le convertir en INT car les formulaire sont automatiquement en string
            $stmt->execute();//pour exécuter la requête SQL de suppression
            $stmt->closeCursor();//la méthode closeCursor est appelée pour fermer le curseur de la requête, libérant ainsi les ressources associées.
        } catch (PDOException $e) {
            // Gérer l'erreur de la requête de suppression
            echo "Erreur de suppression : " . $e->getMessage();
        }
    }
    
    public function compterVehicule($idVehicule){
        $req = "SELECT COUNT(*) AS nb FROM vehicule WHERE idVehicule = :idVehicule"; 
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idVehicule", $idVehicule, PDO::PARAM_INT);//Ne pas oublier de le convertir en INT car les formulaire sont automatiquement en string
        if ($stmt->execute()) {
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return ($resultat) ? $resultat['nb'] : 0;
        } else {
            // Gérez l'erreur de la requête de base de données.
            return 0; // Ou gérer d'une autre manière appropriée.
        }
    }


// AVIS MANAGER
public function getAvis($nom, $prenom, $note, $commentaire) {
    try {
        $req = "INSERT INTO avis (nom, prenom, note, commentaire, created_at, updated_at, garage_idGarage) VALUES (?, ?, ?, ?, NOW(), NOW(), 1)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute([$nom, $prenom, $note, $commentaire]);
        return true;
    } catch (PDOException $e) {
        // A gerer les erreur
       
        return false;
    }
}
// FIN AVIS MANAGER


//CONTACT MANAGER
            public function getDBContact(){
                $req = "SELECT * FROM contactform";
                $stmt = $this->getBdd()->prepare($req);//Préparation de la requête
                $stmt->execute();//Exécution de la requête
                    $contact = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $prestations
                $stmt->closeCursor();//On ferme le curseur
                return empty($contact) ? [] : $contact;
                }

              
}




