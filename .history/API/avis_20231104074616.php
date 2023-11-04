<?php
define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__.'/controllers/front/avis_controller.php');




// Autorise l'origine http://localhost:3000 à accéder à ce script
header("Access-Control-Allow-Origin: http://localhost:3000");

// Autorise les méthodes HTTP spécifiques
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// Autorise les en-têtes personnalisés
header("Access-Control-Allow-Headers: *");

// Répond uniquement aux requêtes OPTIONS si l'origine est autorisée
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(204);
    exit;
}

// Autorise les cookies (si nécessaire)
header("Access-Control-Allow-Credentials: true");

$avisManager = new AvisManager();
$avisController = new AvisController($avisManager);

if ($_SERVER["REQUEST_METHOD"] === "GET") {
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
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérez les données du formulaire
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data !== null) {
        // Traitement des données POST
        // Assurez-vous d'appeler la méthode pour enregistrer l'avis
        $avisController->enregistrerAvis($data);
    } else {
        http_response_code(400); // Code de réponse pour une mauvaise requête
        echo json_encode(["error" => "Données POST invalides"]);
    }
} else {
    http_response_code(404); // Code de réponse pour une ressource non trouvée
    echo json_encode(["error" => "Endpoint non trouvé"]);
}
?>
