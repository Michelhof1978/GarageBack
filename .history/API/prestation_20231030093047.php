<?php
$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
define('__ROOT__', dirname(dirname(__FILE__)));

require_once(__ROOT__ . '/controllers/front/prestation_controller.php');



if ($methode === "GET") {
    // Configuration de la base de données
    $db_host = "localhost"; // Adresse de votre serveur MySQL
    $db_name = "votre_base_de_données"; // Nom de votre base de données
    $db_user = "votre_utilisateur"; // Nom d'utilisateur MySQL
    $db_pass = "votre_mot_de_passe"; // Mot de passe MySQL

    try {
        // Créez une connexion PDO avec votre base de données
        $dbh = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Gérez les erreurs de connexion à la base de données ici
        http_response_code(500);
        echo json_encode(["error" => "Erreur de connexion à la base de données"]);
        exit;
    }

    $prestationController = new PrestationController($dbh);

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
?>
