<?php
$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
define('__ROOT__', dirname(dirname(__FILE__));

require_once(__ROOT__ . '/controllers/front/prestation_controller.php');

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Credentials: true");

$prestationController = new PrestationController();

if ($methode === "GET") {
    $prestations = $prestationController->getAllPrestations(); // Utilisez la méthode appropriée pour obtenir toutes les prestations
    echo json_encode($prestations);
} else {
    http_response_code(404);
    echo json_encode(["error" => "Endpoint not found"]);
}
?>
