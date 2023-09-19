<?php

class AdminController {
    public function __construct()
    {
        
    }

    public function GetPageLogin() {
        
        require_once "views/login_view.php";
    }
    public function connexion(){
        echo password_hash(""); //Pour une connexion sécurisé, cette fonction va générer un mot de passe que je vais générer
        echo "connexion";
    }
}