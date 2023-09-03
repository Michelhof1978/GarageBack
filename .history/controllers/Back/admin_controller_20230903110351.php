<?php

class AdminController {
    public function __construct()
    {
        
    }

    public function GETpageLogin() {
        echo "page de login";
        require_once "views/login.view.php";
    }
}