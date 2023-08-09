<?php

class APIManager{
    public function $this->getDBAccueil(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM accueil');
        return $req;
    }
}