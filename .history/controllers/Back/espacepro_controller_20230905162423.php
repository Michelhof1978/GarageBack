<?php
require_once ".controllers/back/security.class.php";

class EspaceproController{
    public function __construct() {

    }

    public function messagerie(){ //Si l admin est loggé, on affichera la page sinon l évera une erreur
        if(Securite::verifAccessSession()){
            RE
        }else{
            throw new Exception ("Vous n'avez pas accès à cette page");
        }
    }

    public function avis(){

    }

    public function contenu(){

    }

    public function horaire(){

    }

    public function voituresoccasions(){

    }
}


















