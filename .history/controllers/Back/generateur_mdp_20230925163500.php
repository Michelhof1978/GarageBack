<?php

//Aide pour meilleur affichage des description des erreurs ds la console
 error_reporting(E_ALL);
ini_set('display_errors', '1');


require_once(__ROOT__.'\models\back\admin_manager.php');
require_once(__ROOT__.'\controllers\back\security.class.php');
require_once(__ROOT__.'\controllers\back\test_connexion.php');


class AdminController {

    public function getPageLogin() {
require_once(__ROOT__.'\views\login_view.php');
        
    }
    

public function connexion() {
    echo password_hash("admin", PASSWORD_DEFAULT);
    echo "connexion";
    
}

    }