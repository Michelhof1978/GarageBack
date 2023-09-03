<?php
require_once "./models/model.php";

class AdminManager extends Model{
    //Cette fonction va rechercher les informations et la renverra au controller
    public function getPasswordUser($login) {
        $req = 'SELECT * FROM ADMINISTRATEUR'
    }
}

?>