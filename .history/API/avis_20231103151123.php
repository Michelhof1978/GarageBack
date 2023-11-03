<?php
$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__.'/controllers/front/avis_controller.php');


header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Credentials: true");




$avisManager = new AvisManager();
$avisController = new AvisController($avisManager);

if ($methode === "GET") {
    $avis = array();

    if (isset($_GET['nom'])) {
        $avis["nom"] = $_GET['nom'];
    }

    if (isset($_GET['prenom'])) {
        $avis["prenom"] = $_GET['prenom'];
    }

    if (isset($_GET['note'])) {
        $avis['note'] = intval($_GET['note']);
    }

    if (isset($_GET['commentaire'])) {
        $avis['commentaire'] = $_GET['commentaire'];
    }

    $avisController->getAvisVerifies($avis);
} if ($methode === "POST") {
    // Récupérer les données POST JSON
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data !== null) {
        // Traitement des données POST
        // Assurez-vous d'appeler la méthode pour enregistrer l'avis
        $avisController->enregistrerAvis($data);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Invalid JSON data"]);
    }


} else {
    http_response_code(404);
    echo json_encode(["error" => "endpoint not found"]);
}
?>
