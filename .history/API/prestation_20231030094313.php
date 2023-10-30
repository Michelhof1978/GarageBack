<?php
$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . '/controllers/front/prestation_controller.php');




<?php
$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
define('__ROOT__', dirname(dirname(__FILE__));

require_once(__ROOT__ . '/controllers/front/PrestationController.php');

if ($methode === "GET") {
    $prestationController = new PrestationController();

    if (isset($_GET['imagePrestation'])) {
        // Faites quelque chose avec $imagePrestation, par exemple, une requête pour récupérer les prestations ayant cette image.
    } else {
        $prestationController->getAllPrestations();
    }

    // Gérez d'autres cas de demande GET ici si nécessaire
} else {
    http_response_code(404);
    echo json_encode(["error" => "Endpoint not found"]);
}
