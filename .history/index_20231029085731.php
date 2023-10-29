<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

//lorsque la connexion est true ,activation des variables de sessions pour pouvoir les transmettre les infos de page en page.
session_start();

//  Création du fichier index.php dans lequel on définit une constante URL.
//Exemple: 'Location: ' . URL . 'back/espacepro/modifsuppvoituresoccasions'
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http")
 . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// Définition de la constante __ROOT__
define('__ROOT__', dirname(__FILE__));

// On va récupérer le fichier API.controller.php et je vais gérer une instance de ma classe contrôleur

require_once ("controllers/front/vehicule_controller.php");
$apiController = new VehiculeController();

require_once ("models/front/avis_model.php");
$avisManager = new AvisManager();

require_once ("controllers/front/service_controller.php");
$prestation_controller = new PrestationController();

require_once ("controllers/front/avis_controller.php");
$avis_controller = new AvisController($avisManager);

require_once ("controllers/front/contact_controller.php");
$contact_controller = new ContactController();

require_once ("controllers/back/admin_controller.php");
$admin_controller = new AdminController();

require_once ("controllers/back/espacepro_controller.php");
$espacepro_controller = new EspaceproController();

try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas");//Si l'URL est vide ou faussée, on lève une exception et on affiche une page d erreur.
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));//On récupère l'URL et on la filtre pour pouvoir la mieux sécuriser.
        if(empty($url[0]) || empty($url[1])) throw new Exception ("La page n'existe pas");//On va vérifier que l'URL contient bien 2 paramètres en ajoutant une auytre exeption.Si à l'indice 0 ou 1 de l'url après le / n'existe pas aprés la page front ou back, ds ce cas la je vais lever une erreur.
        switch($url[0]){
            case "front" : //On vérifie la valeur de l'url 0, si elle est égale à front, on va vérifier la valeur de l'url 1.
                switch($url[1]){//On vérifie la valeur de l'url 1, si elle est égale à accueil, on affiche la page accueil.
                    case "voiturefiche": //On affiche la page voitureFiche et on ajoute à l'indice 2 la voiture selectionnée avec un Id.
                        if(empty($url[2])) throw new Exception ("L'identifiant de la voiture est manquant");
                        $apiController->getCarsByFilters($url[2]);
                    break;
                    case "contact" : $contact_controller -> getContact();
                    break;
                    case "avis": $avis_controller -> getAvisVerifies($avisManager);
                    break;
                    case "prestation": $prestation -> getPrestation();
                    break;
                    default : throw new Exception ("La page n'existe pas");
                }
            break;
            case "back" :
                 switch($url[1]) {
                case "login" : $admin_controller->getPageLogin(); 
                break;
                case "connexion": $admin_controller->connexion();
                    break;
                    case "admin": $admin_controller->getAccueilAdmin();
                    break; 
                    case "deconnexion": $admin_controller->deconnexion();
                    break; 
                    case "espacepro":
                        switch($url[2]){
                            case "visualisationservice" : $espacepro_controller->visualisationservice(); 
                            break;
                            case "modificationservice" : $espacepro_controller->modificationservice(); 
                            break;
                            case "suppressionservice" : $espacepro_controller->suppressionservice(); 
                            break;
                            case "creationservice" : $espacepro_controller->creationservice(); 
                            break;
                             case "visualisationavis" : $espacepro_controller->visualisationavis(); 
                            break;
                            case "modificationavis" : $espacepro_controller->modificationavis($idAvis); 
                            break;
                            case "suppressionavis" : $espacepro_controller->suppressionavis(); 
                            break;
                            case "creationavis" : $espacepro_controller->creationavis(); 
                            break;
                            case "validationavis" : $espacepro_controller->validationavis($idAvis); 
                            break;
                            case "creationtemplateavis" : $espacepro_controller->creationTemplateAvis(); 
                            break;
                            case "visualisationvoituresoccasions" : $espacepro_controller->visualisationvoituresoccasions(); //echo "voituresoccasions";
                            break;
                             case "modificationvoituresoccasions" : $espacepro_controller->modificationvoituresoccasions($idVehicule); //echo "modification";
                             break;
                            case "suppressionvoituresoccasions" : $espacepro_controller->suppressionvoituresoccasions(); //echo "suppression";
                            break;
                            case "creationtemplatevehicule" : $espacepro_controller->creationTemplateVehicule(); //echo "creation";
                            break;
                            case "creationvoituresoccasions" : $espacepro_controller->creationvoituresoccasions(); //echo "creation";
                            break;
                            default : throw new Exception ("La page n'existe pas");

                        }
                        break;
            default : throw new Exception ("La page n'existe pas");
                 }
            break;
            default : throw new Exception ("La page n'existe pas"); //On léve encore une exeption que s'il n'y a pas front ou back mais autre chose de marqué ds l'url, on affichera un message d'erreur.
        }
    }
} catch (Exception $e){
    $msg = $e->getMessage();
    // echo $msg;
    // echo "a href='".URL."back/login'>login</a>";
}