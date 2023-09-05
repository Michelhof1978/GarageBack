<?php
require_once ".controllers/back/security.class.php";

class Espacepro{
    public function __construct() {

    }

    public function messagerie(){ //Si l admin est loggé, on affichera la page
        if(Securite::verifAccessSession()){
            echo "page1"
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


















