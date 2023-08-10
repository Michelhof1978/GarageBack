<?php
require_once("models/Model.php");

class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD
    public function getDBVoiturefiche(){
       $req = "SELECT * from vehicule v inner join garage g on g.garage = v.garage";
       $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
         $stmt->execute();//Exécution de la requête
            $voiturefiche = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $voiturefiche
        $stmt->closeCursor();//On ferme le curseur
        return $voiturefiche;
        }

    public function getDBPrestations(){
        $req = "SELECT * FROM prestation";
        $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
        $stmt->execute();//Exécution de la requête
            $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $prestations
        $stmt->closeCursor();//On ferme le curseur
        return $prestations;
        }
}