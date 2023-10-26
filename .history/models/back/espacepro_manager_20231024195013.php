<?php

require_once(__ROOT__.'\models\model.php');


class EspaceproManager extends Model {

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

    public function getimageVoiture($idVehicule){
        $req = "SELECT imageVoiture from vehicule where idVehicule = :idVehicule";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idVehicule",$idVehicule,PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $image['imageVoiture'];
    }

    public function getimageCritere($idVehicule){
        $req = "SELECT imageCritere from vehicule where idVehicule = :idVehicule";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idVehicule",$idVehicule,PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $image['imageCritere'];
    }
////////////FIN SUPPRESSION VEHICULE

    //MODIFICATION VEHICULE
    
    public function updateVehicule($idVehicule, $imageVoiture, $famille, $marque,
     $modele, $annee, $kilometrage, $boitevitesse, $energie, $datecirculation, 
     $puissance, $places, $couleur, $description, $prix, $imageCritere, $created_at) {
    
    $req = "UPDATE vehicule SET 
            imageVoiture = :imageVoiture, 
            famille = :famille,
            marque = :marque, 
            modele = :modele, 
            annee = :annee, 
            kilometrage = :kilometrage, 
            boitevitesse = :boitevitesse, 
            energie = :energie, 
            datecirculation = :datecirculation,
            puissance = :puissance, 
            places = :places, 
            couleur = :couleur, 
            description = :description,
            prix = :prix, 
            imageCritere = :imageCritere, 
            created_at = :created_at,
            WHERE idVehicule = :idVehicule";
        
    $stmt = $this->getBdd()->prepare($req);
    
    $stmt->bindValue(":idVehicule", $idVehicule, PDO::PARAM_INT);
    $stmt->bindValue(":imageVoiture", $imageVoiture, PDO::PARAM_STR);
    $stmt->bindValue(":famille", $famille, PDO::PARAM_STR);
    $stmt->bindValue(":marque", $marque, PDO::PARAM_STR);
    $stmt->bindValue(":modele", $modele, PDO::PARAM_STR);
    $stmt->bindValue(":annee", $annee, PDO::PARAM_INT);
    $stmt->bindValue(":kilometrage", $kilometrage, PDO::PARAM_INT);
    $stmt->bindValue(":boitevitesse", $boitevitesse, PDO::PARAM_STR);
    $stmt->bindValue(":energie", $energie, PDO::PARAM_STR);
    $stmt->bindValue(":datecirculation", $datecirculation, PDO::PARAM_STR);
    $stmt->bindValue(":puissance", $puissance, PDO::PARAM_INT);
    $stmt->bindValue(":places", $places, PDO::PARAM_INT);
    $stmt->bindValue(":couleur", $couleur, PDO::PARAM_STR);
    $stmt->bindValue(":description", $description, PDO::PARAM_STR);
    $stmt->bindValue(":prix", $prix, PDO::PARAM_INT);
    $stmt->bindValue(":imageCritere", $imageCritere, PDO::PARAM_STR);
    $stmt->bindValue(":created_at", $created_at, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
}


//CREATION VEHICULE
public function createVehicule($imageVoiture, $famille, $marque, $modele, $annee,
$kilometrage, $boitevitesse, $energie, $datecirculation,
$puissance, $places, $couleur, $description, $prix, $imageCritere, $created_at){

    $datecirculation = $_POST['datecirculation'];
    $created_at = $_POST['created_at'];
    
    $convertedDateCirculation = date("Y-m-d", strtotime($datecirculation));
    $convertedCreatedAt = date("Y-m-d", strtotime($created_at));
    
    

    $req = "INSERT INTO vehicule (imageVoiture, famille, marque, modele, annee, kilometrage,
    boitevitesse, energie, datecirculation, puissance, places, couleur, description, prix, imageCritere, created_at)
        
    VALUES (:imageVoiture, :famille,:marque, :modele, :annee, :kilometrage,   :boitevitesse, 
        :energie, :datecirculation, :puissance, :places, :couleur, :description,  :prix,   :imageCritere, :created_at) ";

    $stmt = $this->getBdd()->prepare($req);

    $stmt->bindValue(":imageVoiture", $imageVoiture, PDO::PARAM_STR);
    $stmt->bindValue(":famille", $famille, PDO::PARAM_STR);
    $stmt->bindValue(":marque", $marque, PDO::PARAM_STR);
    $stmt->bindValue(":modele", $modele, PDO::PARAM_STR);
    $stmt->bindValue(":annee", $annee, PDO::PARAM_INT);
    $stmt->bindValue(":kilometrage", $kilometrage, PDO::PARAM_INT);
    $stmt->bindValue(":boitevitesse", $boitevitesse, PDO::PARAM_STR);
    $stmt->bindValue(":energie", $energie, PDO::PARAM_STR);
    $stmt->bindValue(":datecirculation",  $convertedDateCirculation, PDO::PARAM_STR);
    $stmt->bindValue(":puissance", $puissance, PDO::PARAM_INT);
    $stmt->bindValue(":places", $places, PDO::PARAM_INT);
    $stmt->bindValue(":couleur", $couleur, PDO::PARAM_STR);
    $stmt->bindValue(":description", $description, PDO::PARAM_STR);
    $stmt->bindValue(":prix", $prix, PDO::PARAM_INT);
    $stmt->bindValue(":imageCritere", $imageCritere, PDO::PARAM_STR);
    $stmt->bindValue(":created_at", $convertedCreatedAt, PDO::PARAM_STR);

    if (!$stmt->execute()) {
        $errorInfo = $stmt->errorInfo();
        echo "Erreur d'insertion : " . $errorInfo[2];
    }

    $stmt->closeCursor();

    return $this->getBdd()->lastInsertId();
}

//FIN CREATION VEHICULE

//VISUALIION AVIS
public function getAvis(){
    $sql = "SELECT idAvis, nom, prenom, commentaire, note, created_at
            FROM avis";
    $stmt = $this->getBdd()->prepare($sql);
    $stmt->execute();
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $avis;
}

 ////////SUPPRESSION
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




//FIN VISUALIION AVIS
    




    // public function getMessagerie(){
    //     $sql = "SELECT * FROM messagerie";
    //    $stmt = $this->getBdd()->prepare($sql);
    //    $stmt->execute();
    //    $messagerie = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //    $stmt->closeCursor();
    //    return $messagerie;

    // }

    

   

    // public function getHoraire(){
    //     $sql = "SELECT * FROM horaire";
    //    $stmt = $this->getBdd()->prepare($sql);
    //    $stmt->execute();
    //    $horaire = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //    $stmt->closeCursor();
    //    return $horaire;
    // }

    
}