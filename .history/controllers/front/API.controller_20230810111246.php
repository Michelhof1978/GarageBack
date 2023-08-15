<?php
require_once("models/front/API.manager.php");
require_once("models/Model.php");

// Création du controlleur du côté front qui va regrouper toutes nos routes
class APIController{
    //Crérera automatiquement une instance de classe APIManager et la stockera ds la propriété $apiManager. Cela sera utile pour gérer le JSON par la suite.
    private $apiManager;//propriété privée (accessible uniquement à l'intérieur de cette classe) qui va contenir une instance de la classe APIManager.

    public function __construct(){
        $this->apiManager = new APIManager();
    }
//------------------------------------------------------------------------------------------

    public function getAccueil(){
       
        echo "accueil";
    }

    public function getPrestations($idPrestations){//On récupére en paramétre 2 de l'url l'Id
        $prestations = $this->apiManager->getDBPrestations();//On va chercher la méthode getVoiturefiche() de la classe APIManager et on la stocke ds la variable $voiturefiche.
        Model::sendJSON($prestations);//On appelle la fonction ds model
       
        // echo "<pre>";
        // print_r($prestations);
        // echo "</pre>";
    }

    public function getVoituresfiltre(){
        echo "voiture filtre";
    }

    // public function getVoiturefiche($idVoiturefiche) {
    //     $voiturefiche = $this->apiManager->getDBVoiturefiche();
    //     $selectedVoiture = null;
    
    //     foreach ($voiturefiche as $voiture) {
    //         if ($voiture['idVehicule'] == $idVoiturefiche) {
    //             $selectedVoiture = $voiture;
    //             break;
    //         }
    //     }
    
    //     echo "<table border='1'>";
    //     foreach ($selectedVoiture as $key => $value) {
    //         echo "<tr><td>$key</td><td>$value</td></tr>";
    //     }
    //     echo "</table>";
    // }
    
    
    
    
    
    
    
    
        // echo "<pre>";
        // print_r($voiturefiche);
        // echo "</pre>";
    

    
    
       
    
        

    public function getContact(){
        $contact = $this->apiManager->getDBContact(); // Appel de la méthode pour récupérer les avis depuis le modèle
        Model::sendJSON($contact);
        
        // echo "<pre>";
        // print_r($contact);
        // echo "</pre>";
    }

    public function getAvis(){
        $avis = $this->apiManager->getDBAvis(); // Appel de la méthode pour récupérer les avis depuis le modèle
        Model::sendJSON($avis);
        // echo "<pre>";
        // print_r($avis);
        // echo "</pre>";
    }

    // public function getGarage(){
    //     $avis = $this->apiManager->getDBGarage(); // Appel de la méthode pour récupérer les avis depuis le modèle
    //     echo "<pre>";
    //     print_r($garage);
    //     echo "</pre>";
    // }
}

