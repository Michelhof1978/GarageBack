<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "./models/model.php";

class AdminManager extends Model{
    //Cette fonction va rechercher les informations et la renverra au controller
   private function getPasswordUser($login) {
        // $req = 'SELECT * FROM administrateur WHERE login = ' . $login;
        $req = 'SELECT * FROM employers WHERE login = ' . $login;
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login,PDO::PARAM_STR);//login et password ecrie identiquement par rapport au noms noté ds la table.
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC); //On récupére les informations saisies 
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
    // 
    public function isConnexionValid($login, $password) {
        $passwordBD = $this->getPasswordUser($login);
        
        // // Utilisé pour déboguer, à enlever une fois que ça fonctionne
        // echo "Password saisi : $password<br>";
        // echo "Password enregistré : $passwordBD<br>";
        
        return password_verify($password, $passwordBD);
    }
    
    }



?>