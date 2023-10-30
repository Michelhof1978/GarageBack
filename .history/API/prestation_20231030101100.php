<?php
$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . '/controllers/front/prestation_controller.php');

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Credentials: true");


$prestationManager = new PrestationManager();
$prestationController = new PrestationController($prestationManager);

    
    if ($methode === "GET") {
        $prestations = array();

        if (isset($_GET['imagePrestation'])) {
            $avis["imagePrestation"] = $_GET['imagePrestation'];
        }

        if (isset($_GET['nom'])) {
            $prestations["nom"] = $_GET['nom'];
        }
    
        if (isset($_GET['prix'])) {
            $prestations['prix'] = intval($_GET['prix']);
        }
    
        if (isset($_GET['description'])) {
            $prestations['description'] = $_GET['description'];
        }
    
        $prestationController->getAvisVerifies( $prestations);
    } elseif ($methode === "POST") {  // Ajout de la prise en charge des requêtes POST
        $data = json_decode(file_get_contents("php://input"), true);  // Récupérer les données POST JSON
    
        if ($data !== null) {
            // Traitement des données POST
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
    
