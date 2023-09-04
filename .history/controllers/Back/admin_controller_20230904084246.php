<?php

//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');


require "./controllers/back/security.class.php";
require "./models/back/admin_manager.php";

class AdminController {
        private $AdminManager;

    public function __construct()
    {
        $this->AdminManager = new AdminManager();
    }

    public function GetPageLogin() {
        
        require_once "views/login_view.php";
    }
    
   
    }

    