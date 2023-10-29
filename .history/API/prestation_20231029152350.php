<?php
$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
define('__ROOT__', dirname(dirname(__FILE__)));


require_once(__ROOT__ . '/controllers/front/prestation_controller.php');

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Credentials: true");

if ($methode === "GET") {
    $prestationController = new PrestationController();

    if (isset($_GET['imagePrestation'])) {
        $imagePrestation = $_GET['imagePrestation'];
       

    if (isset($_GET['nom'])) {
        $nom = $_GET['nom'];
        // Faites quelque chose avec $nom (peut-être appeler une méthode de PrestationController).
    }

    if (isset($_GET['prix'])) {
        $prix = intval($_GET['prix']);
        // Faites quelque chose avec $prix (peut-être appeler une méthode de PrestationController).
    }

    if (isset($_GET['description'])) {
        $description = $_GET['description'];
        // Faites quelque chose avec $description (peut-être appeler une méthode de PrestationController).
    }

} else {
    http_response_code(404);
    echo json_encode(["error" => "endpoint not found"]);
}
?>
