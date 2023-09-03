<?php
require_once(__ROOT__.'\models\model.php');


class ContactController {
    public function getContact(){
        header("Access-Control-Allow-Origin: https://garageparrottoulouse.com");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");

        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data);

        if ($data !== null && property_exists($data, 'email')) {
            $from = $data->email;
            $messageRetour = [
                'from' => $from,
                'to' => "contact@michelaquiche.com"
            ];
        } else {
            $messageRetour = [
                'from' => null,
                'to' => "contact@michelaquiche.com"
            ];
        }

        echo json_encode($messageRetour);
    }
}

  //PARTIE A TESTER LORS DE LA MISE EN LIGNE DU SITE
        // $to="contact@michelaquiche.com";
        // $subject = "Message de : " . $obj->nom;
        // $message = $obj->message;
        // $headers = "From : " . $obj->email;
<<<<<<< HEAD
        // mail($to, $subject, $message, $headers);
=======
        // mail($to, $subject, $message, $headers);
>>>>>>> 759c69f0c9622f874cdbef05da8ee651ba1b6947
