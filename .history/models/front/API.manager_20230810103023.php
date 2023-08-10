<?php
require_once("models/Model.php");

// Instance de la classe APIManager (supposons que vous l'avez instanciée ailleurs dans le code)
$apiManager = new APIManager();

// Récupération des données de la base de données
$voiturefiche = $apiManager->getDBVoiturefiche();

// Vérification si des données ont été récupérées
if (!empty($voiturefiche)) {
    // Utilisation de la boucle foreach pour parcourir les données
    foreach ($voiturefiche as $ligne) {
        // Traitez chaque ligne ici
        // Vous pouvez accéder aux champs spécifiques comme $ligne["vehicule_id"], etc.
    }
} else {
    echo "Aucune donnée de voiture trouvée.";
};


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


