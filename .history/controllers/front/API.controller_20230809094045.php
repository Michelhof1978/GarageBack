<?php
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
}

