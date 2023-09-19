<?php

class AdminController {
    public function __construct()
    {
        
    }

    public function GetPageLogin() {
        echo "page de login";
        require_once "views/login.view.php";
    }
}