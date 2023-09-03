<?php

require "./controllers/back/security.class.php";

class AdminController {
    public function __construct()
    {
        
    }

    public function GetPageLogin() {
        
        require_once "views/login_view.php";
    }
    public function connexion(){
//vérification si les informations ds login et mdp ont bien été saisis
if (!empty($_POST["login"]) && !empty($_POST["password"])) {
    $login = Securite::secureHtml()
}



        //UTILISATION D UNE METHODE CRYPTE DU MDP
//Pour une connexion sécurisé, cette fonction va générer un mot de passe que je vais générer
//Je vais utiliser le PASSWORD_DEFAULT qui est apparemment le plus sécurisé d aujourdh'ui
        // echo password_hash("adminmichelaquiche", PASSWORD_DEFAULT); //Ainsi le mdp sera cypté 
         }
}