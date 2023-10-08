<?php

//Aide pour meilleur affichage des description des erreurs ds la console
//  error_reporting(E_ALL);
//  ini_set('display_errors', '1');

require "C:/xampp/htdocs/GarageBack/controllers/back/security.class.php";
require "C:/xampp/htdocs/GarageBack/controllers/back/test_connexion.php";
//  require_once "C:/xampp/htdocs/GarageBack/models/admin_manager.php";

// require "/controllers/back/security.class.php";
// require "/controllers/back/test_connexion.php";
 require "/models/back/admin_manager.php";


class AdminController {

    ///////////////////////////////////////////////////////////////////////////
       //GENERATEUR DE MDP HACHE A INSERER DS LA BDD
// A insérer au tout départ sans le reste du code.
//En cliquant sur valider sans rien écrire ds le formulaire, cela va générer un mdp haché que je pourrais utiliser ds ma bdd pour tests

// public function GetPageLogin() {
//     require_once(__ROOT__.'\views\login_view.php');
            
//         }

// public function connexion() {

//     echo password_hash("michelaquiche", PASSWORD_DEFAULT);
// //     echo "connexion";
//  }
//////////////////////////////////////////////////////////////////////////

        private $AdminManager; //Déclaration d une propriéte privée

    public function __construct()
    {
        $this->AdminManager = new AdminManager();
        // // Utilisé pour déboguer, à enlever une fois que ça fonctionne
            // echo "Login : $login<br>";
            // echo "Password : $password<br>";
        // $this->hashPassword(); // Appeler la fonction de hachage ci dessous
    }

    public function GetPageLogin() {
require_once(__ROOT__.'\views\login_view.php');
        
    }
    

// On va gérer la soumission de données de connexion, verifier leur validté et définir une variable de session en fonction de la réussite ou pas de l'authentification et ainsi rediruger à la page admin ou login si echec
public function connexion(){
    if (!empty($_POST["login"]) && !empty($_POST["password"])) {
        $login = Securite::secureHtml($_POST["login"]);
        $password = Securite::secureHtml($_POST["password"]);

        // // Utilisé pour déboguer, à enlever une fois que ça fonctionne
        // echo "Login : $login<br>";
        // echo "Password : $password<br>";

        if($this->AdminManager->isConnexionValid($login, $password)) {
            $_SESSION['access'] = "admin";
            header('Location: '.URL."back/admin");
        } else {
            header('Location: '.URL."back/login");
        }
    }
}
    

//vérification si l utilisateur s i il a bien les identifiants et qu'ils sont bien remplis
        public function getAccueilAdmin(){
            if(Securite::verifAccessSession()){ 
                require "./views/accueilAdmin_view.php";
            }else{ 
                header('Location: '.URL."back/login");
            }
           
        }

        public function deconnexion(){
           session_destroy(); //Va supprimer la variable de session
           header('Location: '.URL."back/login");//redirection sur la page connexion
        }

        
    }