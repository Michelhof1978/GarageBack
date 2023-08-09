<?php
require_once("models/front/API.manager.php");

// Création du controlleur du côté front qui va regrouper toutes nos routes
class APIController{
    


    public function getAccueil(){
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

