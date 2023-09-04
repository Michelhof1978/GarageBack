<?php

//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');


require "./controllers/back/security.class.php";
require "./models/back/admin_manager.php";

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
        ech
    }
   
    }

    // public function connexion(){
    //     //vérification si les informations ds login et mdp ont bien été saisis
    //     if (!empty($_POST["login"]) && !empty($_POST["password"])) {
            
    //         $login = Security::secureHtml($_POST["login"]);
    //         $password = Security::secureHtml($_POST["password"]);
    //         if($this->AdminManager->isConnexionValid($login, $password)) {
    //             //Si true, on va pouvoir générer une session
    //             $_SESSION['access'] = "admin";
    //             header('Location: '.URL."back/admin");//redirection après connexion true vers la page admin
        
    //             //Si c'est TRUE donc que les infos sont bien rempli, on le redirigera vers la page Admi sinon on le redirige de nouveau sur la page de login
    //         }else {
    //             header('Location: '.URL."back/login");
    //         }
        
        
        
    //             //UTILISATION D UNE METHODE CRYPTE DU MDP
    //     //Pour une connexion sécurisé, cette fonction va générer un mot de passe que je vais générer
    //     //Je vais utiliser le PASSWORD_DEFAULT qui est apparemment le plus sécurisé d aujourdh'ui
    //             //echo password_", PASSWORD_DEFAULT); //Ainsi le mdp sera cypté 
    //              }
                
    //             }
    //             public function getAccueilAdmin(){
    //                 require "views/accueilAdmin_view.php";
    //             }