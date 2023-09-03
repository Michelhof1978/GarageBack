<?php

class AdminController {
    public function __construct()
    {
        
    }

    public function GetpageLogin() {
        echo "page de login";
        require_once "views/login.view.php";
    }
}