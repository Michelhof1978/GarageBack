<?php
require_once("models/Model.php");

class APIManager extends Model{ //va hériter de Model et qui permettra la connexion à la BDD
    public function getDBVoi(){
       $req = "SELECT * FROM accueil";
    }
}