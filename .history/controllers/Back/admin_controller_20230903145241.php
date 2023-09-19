<?php

class AdminController {
    public function __construct()
    {
        
    }

    public function GetPageLogin() {
        
        require_once "views/login_view.php";
    }
    public function connexion(){

        
//Pour une connexion sécurisé, cette fonction va générer un mot de passe que je vais générer
//Je vais utiliser le PASSWORD_DEFAULT qui est apparemment le plus sécurisé d aujourdh'ui
        echo password_hash("adminmichelaquiche", PASSWORD_DEFAULT); //Ainsi le mdp sera cypté 
        
        echo "connexion";
    }
}