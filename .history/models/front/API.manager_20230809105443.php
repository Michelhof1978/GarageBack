<?php
require_once("models/Model.php");

class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD
    public function getDBVoiturefiche(){
       $req = "SELECT * FROM vehicule";
       $stmt = $this->getBdd()->prepare($req);//Prépparation de la requête
         $stmt->execute();//Exécution de la requête
            $voiturefiche = $stmt->fetchAll(PDO::FETCH_ASSOC);//On va chercher toutes les données de la requête et on les stocke ds la variable $voiturefiche
        $stmt->closeCursor();//On ferme le curseur
        re
        }
}