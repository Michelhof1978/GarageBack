<?php
$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
define('__ROOT__', dirname(dirname(__FILE__)));


require_once(__ROOT__.'/controllers/front/avis_controller.php');

$avisManager = new AvisManager();
$controller = new AvisController($avisManager);

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

    $controller->getAvis($avis); // Vous devez appeler getAvis après avoir défini $avis
} else {
    http_response_code(404);
    echo json_encode(["error" => "endpoint not found"]);
}

?>
