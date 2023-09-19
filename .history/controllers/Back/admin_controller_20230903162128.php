<?php

require "./controllers/back/security.class.php";

class AdminController {
        private $AdminManager;

    public function __construct()
    {
        $this->AdminManager = new AdminManager();
    }

    public function GetPageLogin() {
        
        require_once "views/login_view.php";
    }
    public function connexion(){
//vérification si les informations ds login et mdp ont bien été saisis
if (!empty($_POST["login"]) && !empty($_POST["password"])) {
    
    $login = Security::secureHtml($_POST["login"]);
    $password = Security::secureHtml($_POST["password"]);
    if($this->AdminManager->isConnexionValid($login, $password)) {
//Si c'est TRUE donc que les infos sont bien rempli, on le redirigera vers la page Admi sinon on le redirige de nouveau sur la page de login
    }else {
        header('Location: 'URL.)
    }



        //UTILISATION D UNE METHODE CRYPTE DU MDP
//Pour une connexion sécurisé, cette fonction va générer un mot de passe que je vais générer
//Je vais utiliser le PASSWORD_DEFAULT qui est apparemment le plus sécurisé d aujourdh'ui
        // echo password_hash("adminmichelaquiche", PASSWORD_DEFAULT); //Ainsi le mdp sera cypté 
         }
}