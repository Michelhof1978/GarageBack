<?php

class AdminController {
    public function __construct()
    {
        
    }

    public function GetPageLogin() {
        echo "page de login";
        require_once(dirname(__FILE__) . 'views/login.view.php');

    }
}