<?php

class AdminController {
    public function __construct()
    {
        
    }

    public function GetPageLogin() {
        
        require_once "views/login_view.php";
    }
    public function connexion(){
        
        echo password_hash("adminmichelaquiche"); 
        echo "connexion";
    }
}