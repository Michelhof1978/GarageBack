<?php
require_once 'models/model.php';

class Messagerie extends Model {

    public function getMessagerie(){
        $sql = "SELECT * FROM messagerie";
       $stmt = $this->getBdd()->prepare($);

    }
}