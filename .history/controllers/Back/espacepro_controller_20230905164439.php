<?php
require_once ".controllers/back/security.class.php";
require_once ".models/back/espacepro_manager.php";


class EspaceproController{

    private $espacepromanager;

    public function __construct() { //On va générer une instance de EspaceproController
        $espacepromanager = new EspaceproManager();
    }

    public function messagerie(){ //Si l admin est loggé, on affichera la page sinon l évera une erreur
        if(Securite::verifAccessSession()){
            $messagerie
            require_once "views/commons/espacepro_messagerie_view.php";
        }else{
            throw new Exception ("Vous n'avez pas accès à cette page");
        }
    }

    public function avis(){
            if(Securite::verifAccessSession()){
                require_once "views/commons/espacepro_avis_view.php";
            }else{
                throw new Exception ("Vous n'avez pas accès à cette page");
            }
    }

    public function contenu(){

        if(Securite::verifAccessSession()){
            require_once "views/commons/espacepro_contenu_view.php";
        }else{
            throw new Exception ("Vous n'avez pas accès à cette page");
        }

    }

    public function horaire(){
        if(Securite::verifAccessSession()){
            require_once "views/commons/espacepro_horaire_view.php";
        }else{
            throw new Exception ("Vous n'avez pas accès à cette page");
        }
    }

    public function voituresoccasions(){
        if(Securite::verifAccessSession()){
            require_once "views/commons/espacepro_voituresoccasions_view.php";
        }else{
            throw new Exception ("Vous n'avez pas accès à cette page");
        }

    }
}


















