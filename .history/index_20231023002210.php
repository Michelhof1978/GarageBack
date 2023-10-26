<?php
// Aide pour un meilleur affichage des descriptions des erreurs dans la console.
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Activation des variables de session pour transmettre les informations de page en page.
session_start();

// Définition de la constante URL.
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// Définition de la constante __ROOT__
define('__ROOT__', dirname(__FILE__));

// Instanciez votre gestionnaire (adminManager) ici.
require_once(__ROOT__ . '\models\back\admin_manager.php');
$adminManager = new AdminManager();

// Inclusion des contrôleurs
require_once("controllers/front/vehicule_controller.php");
require_once("controllers/front/contact_controller.php");
require_once("controllers/back/admin_controller.php");
require_once("controllers/back/espacepro_controller.php");
require_once("controllers/front/avis_controller.php");

try {
    if (empty($_GET['page'])) {
        throw new Exception("La page n'existe pas");
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));

        if (empty($url[0]) || empty($url[1])) {
            throw new Exception("La page n'existe pas");
        }

        switch ($url[0]) {
            case "front":
                switch ($url[1]) {
                    case "voiturefiche":
                        if (empty($url[2])) {
                            throw new Exception("L'identifiant de la voiture est manquant");
                        }
                        $apiController = new VehiculeController();
                        $apiController->getCarsByFilters($url[2]);
                        break;
                    case "contact":
                        $contact_controller = new ContactController();
                        $contact_controller->getContact();
                        break;
                    case "avis":
                        $avis_controller = new AvisController($adminManager);
                        $avis_controller->getAvis();
                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }
                break;
            // ... Autres cas ...
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    echo "Erreur : " . $msg;
}