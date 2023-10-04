<?php
//Aide pour meilleur affichage des description des erreurs ds la console
 error_reporting(E_ALL);
 ini_set('display_errors', '1');


// // require_once('/models/model.php');
// require_once(__ROOT__.'\models\model.php');

require_once "./models/model.php";
require "C:/xampp/htdocs/GarageBack/s/back/security.class.php";


class AdminManager extends Model{
    //Cette fonction va rechercher les informations admin et password ds la bdd et la renverra au controller
    private function getPasswordUser($login) {
        
        $req = 'SELECT password FROM administrateur WHERE login = :login';
        $stmt = $this->getBdd()->prepare($req);//Prépare la requête
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();//exécute la requête SQL préparée avec les paramètres liés.
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);//récupère le résultat de la requête sous forme de tableau associatif 
        $stmt->closeCursor();//ferme le curseur de la requête, libérant ainsi les ressources associées.
        return $admin['password'];
    }

    
    
    public function isConnexionValid($login, $password) {
        $passwordBD = $this->getPasswordUser($login);

        // // Utilisé pour déboguer, à enlever une fois que ça fonctionne
        // echo "Password saisi : $password<br>";
        // echo "Password enregistré : $passwordBD<br>";

        return password_verify($password, $passwordBD);
    }
    

    // private function getPasswordAdmin($login) {
    //     // $req = 'SELECT * FROM administrateur WHERE login = ' . $login;
    //     $req = 'SELECT * FROM administrateur WHERE login = ' . $login;
    //     $stmt = $this->getBdd()->prepare($req);
    //     $stmt->bindValue(":login", $login,PDO::PARAM_STR);
    //     $stmt->execute();
    //     $admin = $stmt->fetch(PDO::FETCH_ASSOC); //On récupére les informations saisies 
    //     $stmt->closeCursor();
    //     return $admin['password'];
    // }

    
    }



?>