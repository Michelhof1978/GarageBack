<?php
require_once(__ROOT__.'\models\model.php');

class ContactController {
    

    public function getContact(){
        header("Access-Control-Allow-Origin: https://garageparrottoulouse.com");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");

        $obj = json_decode(file_get_contents('php://input'));

        //PARTIE A TESTER LORS DE LA MISE EN LIGNE DU SITE
        // $to="contact@michelaquiche.com";
        // $subject = "Message de : " . $obj->nom;
        // $message = $obj->message;
        // $headers = "From : " . $obj->email;
        // mail($to, $subject, $message, $headers);

        $messageRetour = [
            'from' => $obj->email;
            'to' => "contact@michelaquiche.com"
        ];

        echo json_encode($messageRetour);
    }
}
