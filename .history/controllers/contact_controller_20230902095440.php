<?php
require_once(__ROOT__.'\models\contact_model.php');

class ContactController {
    private $contact;

    public function contact(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");

        $obj = json_decode(file_get_contents('php://input'));

        $messageRetour = [
            'from' => $obj->email,
            'to' => "contact@M.com"
        ];

        echo json_encode($messageRetour);
    }
}
