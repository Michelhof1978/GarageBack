<?php
require_once("models/front/API.manager.php");

// Création du controlleur du côté front qui va regrouper toutes nos routes
class APIController{
    //Crérera automatiquement une instance de classe APIManager et la stockera ds la propriété $apiManager. Cela sera utile pour gérer le JSON par la suite.
    private $apiManager;//propriété privée (accessible uniquement à l'intérieur de cette classe) qui va contenir une instance de la classe APIManager.

    public function __construct(){
        $this->apiManager = new APIManager();
    }
//------------------------------------------------------------------------------------------

    public function getAccueil(){
        $accueil = $this->apiManager->getDBAccueil();//On va chercher la méthode getAccueil() de la classe APIManager et on la stocke ds la variable $accueil.
        echo "accueil";
    }

    public function getPrestations($idPrestations){//On récupére en paramétre 2 de l'url l'Id
        echo " page prestations".$idPrestations." demandées";
    }

    public function getVoituresfiltre(){
        echo "voiture filtre";
    }

    public function getVoiturefiche($idVoiturefiche){//On récupére en paramétre 2 de l'url l'Id
        echo " page voiturefiltre".$idVoiturefiche." demandées";
    }

    public function getContact(){
        echo "contact";
    }

    public function getAvis(){
        echo "avis";
    }
}

