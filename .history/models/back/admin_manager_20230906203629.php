<?php
//Aide pour meilleur affichage des description des erreurs ds la console
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

session_start();
require_once(__ROOT__.'\models\model.php');


class AdminManager extends Model{
    //Cette fonction va rechercher les informations et la renverra au controller
    private function getPasswordUser($login) {
        // Remarque : assurez-vous que la requête SQL est correcte et sécurisée
        $req = 'SELECT password FROM employes WHERE login = :login';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $admin['password'];
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
    //Fonction qui fera les vérifications
    public function isConnexionValid($login, $password) {
        $passwordBD = $this->getPasswordUser($login);
        
        if ($passwordBD !== false && password_verify($password, $passwordBD)) {
            return true; // Authentification réussie
        } else {
            return false; // Authentification échouée
        }
    }
    
    
    }



?>