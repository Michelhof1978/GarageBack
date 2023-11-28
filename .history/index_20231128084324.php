<?php
// Aide pour un meilleur affichage des descriptions d'erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Lorsque la connexion est true, activation des variables de sessions pour pouvoir les transmettre les infos de page en page.
session_start();            

// Création du fichier index.php dans lequel on définit une constante URL.
//Exemple: location = http  url= localhost  === http://localhost
// Exemple: 'Location: ' . URL . 'back/espacepro/modifsuppvoituresoccasions'
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// Définition de la constante __ROOT__
define('__ROOT__', dirname(__FILE__));

// On va récupérer le fichier API.controller.php et je vais gérer une instance de ma classe contrôleur

require_once("controllers/front/vehicule_controller.php");
$apiController = new VehiculeController();

require_once("models/front/avis_model.php");
$avisManager = new AvisManager();

require_once("controllers/front/prestation_controller.php");
$prestationManager = new PrestationManager();

$prestation_controller = new PrestationController($prestationManager);

require_once("controllers/front/avis_controller.php");
$avis_controller = new AvisController($avisManager);

require_once("controllers/front/contact_controller.php");
$contact_controller = new ContactController();

require_once("controllers/back/admin_controller.php");
$admin_controller = new AdminController();

require_once("controllers/back/espacepro_controller.php");
$espacepro_controller = new EspaceproController();

try {
    if (empty($_GET['page'])) {
        throw new Exception("La page n'existe pas"); // Si l'URL est vide ou faussée, on lève une exception et on affiche une page d'erreur.
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL)); // On récupère l'URL et on la filtre pour pouvoir la mieux sécuriser.
        if (count($url) < 2) {
            throw new Exception("La page n'existe pas");
        }
        switch ($url[0]) {
            case "front":
                switch ($url[1]) {
                    case "voiturefiche":
                        if (count($url) < 3) {
                            throw new Exception("L'identifiant de la voiture est manquant");
                        }
                        $apiController->getCarsByFilters($url[2]);
                        break;
                    case "contact":
                        $contact_controller->getContact();
                        break;
                    case "avis":
                        $avis_controller->getAvisVerifies();
                        break;
                    case "prestation":
                        $prestation_controller->getAllPrestations($prestationManager);
                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }
                break;
            case "back":
                switch ($url[1]) {
                    case "login":
                        $admin_controller->getPageLogin();
                        break;
                    case "connexion":
                        $admin_controller->connexion();
                        break;
                    case "admin":
                        $admin_controller->getAccueilAdmin();
                        break;
                    case "deconnexion":
                        $admin_controller->deconnexion();
                        break;
                    case "espacepro":
                        if (count($url) < 3) {
                            throw new Exception("La page n'existe pas");
                        }
                        switch ($url[2]) {
                            case "visualisationprestation":
                                $espacepro_controller->visualisationprestation();
                                break;
                            case "modificationprestation":
                                $espacepro_controller->modificationprestation();
                                break;
                            case "suppressionprestation":
                                $espacepro_controller->suppressionprestation();
                                break;
                            case "creationprestation":
                                $espacepro_controller->creationprestation();
                                break;
                            case "creationtemplateprestation":
                                $espacepro_controller->creationTemplatePrestation();
                                break;
                            case "visualisationavis":
                                $espacepro_controller->visualisationavis();
                                break;
                            case "modificationavis":
                                $espacepro_controller->modificationavis();
                                break;
                            case "suppressionavis":
                                $espacepro_controller->suppressionavis();
                                break;
                            case "creationavis":
                                $espacepro_controller->creationavis();
                                break;
                            case "validationavis":
                                $espacepro_controller->validationavis();
                                break;
                            case "creationtemplateavis":
                                $espacepro_controller->creationTemplateAvis();
                                break;
                            case "visualisationvoituresoccasions":
                                $espacepro_controller->visualisationvoituresoccasions();
                                break;
                            case "modificationvoituresoccasions":
                                $espacepro_controller->modificationvoituresoccasions();
                                break;
                            case "suppressionvoituresoccasions":
                                $espacepro_controller->suppressionvoituresoccasions();
                                break;
                            case "creationtemplatevehicule":
                                $espacepro_controller->creationTemplateVehicule();
                                break;
                            case "creationvoituresoccasions":
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
   
}
?>
