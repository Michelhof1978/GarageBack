<?php

//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(__ROOT__.'\models\front\vehicule_model.php');


//contrôleur qui va manipuler les données de véhicules dans l'application. Elle utilisera un modèle (VehiculeModel) pour accéder aux données et gérer les opérations liées aux véhicules. 
// Création du controlleur du côté front qui va regrouper toutes nos routes
class VehiculeController{
    //Crérera automatiquement une instance de classe APIManager et la stockera ds la propriété $apiManager. Cela sera utile pour gérer le JSON par la suite.
    private $apiManager;//propriété privée (accessible uniquement à l'intérieur de cette classe) qui va contenir une instance de la classe APIManager.

    public function __construct(){
        $this->apiManager = new VehiculeModel();
    }

public function getCarsByFilters($filtres){
    $cars=$this->apiManager->getCarsByFilters($filtres);
    header('Content-Type: application/json');
        echo json_encode($cars);
}



}
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
        
        require_once "./views/login_view.php";
    }


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
    
    
//     public function connexion(){
// //vérification si les informations ds login et mdp ont bien été saisis
// if (!empty($_POST["login"]) && !empty($_POST["password"])) {
    
//     $login = Securite::secureHtml($_POST["login"]);
//     $password = Securite::secureHtml($_POST["password"]);
//     if($this->AdminManager->isConnexionValid($login, $password)) {
//         //Si true, on va pouvoir générer une session
//         $_SESSION['access'] = "admin";
//         header('Location: '.URL."back/admin");//redirection après connexion true vers la page admin

//         //Si c'est TRUE donc que les infos sont bien rempli, on le redirigera vers la page Admi sinon on le redirige de nouveau sur la page de login
//     }else {
//         header('Location: '.URL."back/login");
//     }



//         UTILISATION D UNE METHODE CRYPTE DU MDP
// Pour une connexion sécurisé, cette fonction va générer un mot de passe 
// Je vais utiliser le PASSWORD_DEFAULT qui est apparemment le plus sécurisé d aujourdh'ui
// $plainPassword = "michelaquiche"; // Mot de passe en clair pour les tests
// $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// echo "Mot de passe en clair : $plainPassword\n";
// echo "Mot de passe haché : $hashedPassword\n";

        //  }
        
        // }
        public function getAccueilAdmin(){
            if(Securite::verifAccessSession()){ //vérification si l utilisateur s i il a bien les identifiants et qu'ils sont bien remplis
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