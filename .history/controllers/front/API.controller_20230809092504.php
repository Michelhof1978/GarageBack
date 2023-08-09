<?php
// Création du controlleur du côté front qui va regrouper toutes nos routes
class APIController{
    public function getAccueil(){
        
        echo "accueil";
    }

    public function getPrestations($idPrestations){//On récupére en paramétre 2
        echo " page prestations".$url[2]." demandées";
    }
}

