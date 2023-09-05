<?php

//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');


require "./controllers/back/security.class.php";
require "./controllers/back/test_connexion.php";
require "./models/back/admin_manager.php";

class AdminController {
        private $AdminManager; //Déclaration d une propriéte privée

    public function __construct()
    {
        $this->AdminManager = new AdminManager();
    }

    public function GetPageLogin() {
        
        require_once "views/login_view.php";
    }
    
    class AdminController {
        // ...
        
        public function connexion() {
            if (!empty($_POST["login"]) && !empty($_POST["password"])) {
                $login = Securite::secureHtml($_POST["login"]);
                $password = Securite::secureHtml($_POST["password"]);
                if ($this->AdminManager->isConnexionValid($login, $password)) {
                    $_SESSION['access'] = "admin";
                    header('Location: ' . URL . "back/admin");
                } else {
                    header('Location: ' . URL . "back/login");
                }
            }
        }
    
        // ...
    }
    


//         UTILISATION D UNE METHODE CRYPTE DU MDP
// Pour une connexion sécurisé, cette fonction va générer un mot de passe 
// Je vais utiliser le PASSWORD_DEFAULT qui est apparemment le plus sécurisé d aujourdh'ui
// $plainPassword = "michelaquiche"; // Mot de passe en clair pour les tests
// $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// echo "Mot de passe en clair : $plainPassword\n";
// echo "Mot de passe haché : $hashedPassword\n";

         }
        
        }
        public function getAccueilAdmin(){
            if(Securite::verifAccessSession()){ //vérification si l utilisateur s i il a bien les identifiants et qu'ils sont bien remplis
                require "views/accueilAdmin_view.php";
            }else{
                header('Location: '.URL."back/login");
            }
           
        }

        public function deconnexion(){
           session_destroy(); //Va supprimer la variable de session
           header('Location: '.URL."back/login");//redirection sur la page connexion
        }
    }