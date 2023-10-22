<?php
// Aide pour un meilleur affichage des descriptions des erreurs dans la console.
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Activation des variables de session pour transmettre les informations de page en page.
session_start();

// Définition de la constante URL.
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http")
 . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// Définition de la constante __ROOT__
define('__ROOT__', dirname(__FILE__));

// Instanciez votre gestionnaire (adminManager) ici.
$adminManager = new AdminManager();

// Ensuite, instanciez AvisController en lui passant le gestionnaire.
$avisController = new AvisController($adminManager);

require 'Adminùanager.php'; // Ajustez le chemin du fichier au besoin

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
                    default:
                        throw new Exception("La page n'existe pas");
                }
                break;
            case "back":
                switch ($url[1]) {
                    case "login":
                        $admin_controller = new AdminController();
                        $admin_controller->getPageLogin();
                        break;
                    case "connexion":
                        $admin_controller = new AdminController();
                        $admin_controller->connexion();
                        break;
                    case "admin":
                        $admin_controller = new AdminController();
                        $admin_controller->getAccueilAdmin();
                        break;
                    case "deconnexion":
                        $admin_controller = new AdminController();
                        $admin_controller->deconnexion();
                        break;
                    case "espacepro":
                        switch ($url[2]) {
                            case "avis":
                                $espacepro_controller = new AvisController();
                                $espacepro_controller->avis();
                                break;
                            case "visualisationvoituresoccasions":
                                $espacepro_controller = new EspaceproController();
                                $espacepro_controller->visualisationvoituresoccasions();
                                break;
                            case "modificationvoituresoccasions":
                                $espacepro_controller = new EspaceproController();
                                $espacepro_controller->modificationvoituresoccasions();
                                break;
                            case "suppressionvoituresoccasions":
                                $espacepro_controller = new EspaceproController();
                                $espacepro_controller->suppressionvoituresoccasions();
                                break;
                            case "creationvoituresoccasions":
                                $espacepro_controller = new EspaceproController();
                                $espacepro_controller->creationvoituresoccasions();
                                break;
                            default:
                                throw new Exception("La page n'existe pas");
                        }
                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }
                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    echo "Erreur : " . $msg;
}
