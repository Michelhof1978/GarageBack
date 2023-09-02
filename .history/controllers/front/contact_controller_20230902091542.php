<?php
require_once(__ROOT__.'\models\contact_model.php');

class ContactController {
    private $contact;

    public function contact(){
        header("Access-Control-Allow-Origin *");
        header("content-type: application/json");
        echo json_encode($this->contact
    }
}
