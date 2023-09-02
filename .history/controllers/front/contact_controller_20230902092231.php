<?php
require_once(__ROOT__.'\models\contact_model.php');

class ContactController {
    private $contact;

    public function contact(){
        header("Access-Control-Allow-Origin *");
        header("Access-Control-Allow-Method : POST ,GET, OPTIONS, PUT, DELETE");
        
        header("content-type: application/json");
        echo json_encode("ok");
    }
}
