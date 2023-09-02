<?php

class AdiminController {
    public function __construct()
    {
        
    }

    public function pageLogin() {
        echo "page de login";
        require_once "views/login.view.php";
    }
}