<?php
require_once "./models/model.php";

class AdminManager extends Model{
    //Cette fonction va rechercher les informations et la renverra au controller
    public function getPasswordUser($login) {
        $req = 'SELECT * FROM administrateur WHERE login = ' . $login;
        $req = 'SELECT * FROM employers WHERE login = ' . $login;
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login", $login,PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC); //On récupére les informations saisies 
        return $admin['password'];
    }
}

?>