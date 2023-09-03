<?php 
// 1. Création du fichier index.php dans lequel on définit une constante URL.
// 
require_once __ROOT__ . '/controllers/vehicule_controller.php';


//On va récupérer le fichier API.controller.php et je vais gérer une instance de ma classe contrôleur
require_once("controllers/vehicule_controller.php");
$apiController = new VehiculeController();

try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas");//Si l'URL est vide ou faussée, on lève une exception et on affiche une page d erreur.
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));//On récupère l'URL et on la filtre pour pouvoir la mieux sécuriser.
        if(empty($url[0]) || empty($url[1])) throw new Exception ("La page n'existe pas");//On va vérifier que l'URL contient bien 2 paramètres en ajoutant une auytre exeption.Si à l'indice 0 ou 1 de l'url après le / n'existe pas aprés la page front ou back, ds ce cas la je vais lever une erreur.
        switch($url[0]){
            case "front" : //On vérifie la valeur de l'url 0, si elle est égale à front, on va vérifier la valeur de l'url 1.
                switch($url[1]){//On vérifie la valeur de l'url 1, si elle est égale à accueil, on affiche la page accueil.
                    case "accueil": $apiController->getAccueil();
                    break;
                    case "prestations": 
                        if(empty($url[2])) throw new Exception ("L'identifiant de la prestation est manquant");//On s'écurise de nouvel fois l'url pour s'assurer qu'il y a bien une info en position 2 de l'url sinon envoie du message d erreur
                        $apiController->getPrestations($url[2]);//On affiche la page prestation et on ajoute à l'indice 2 la prestation demandée avec un Id.
                    break;
                    case "voiturefiche": //On affiche la page voitureFiche et on ajoute à l'indice 2 la voiture selectionnée avec un Id.
                        if(empty($url[2])) throw new Exception ("L'identifiant de la voiture est manquant");
                        $apiController->getCarsByFilters($url[2]);
                    break;
                    case "contact": echo "page contact";
                    break;
                    case "avis": echo "page avis";
                    break;
                    default : throw new Exception ("La page n'existe pas");
                }
            break;
            case "back" : echo "page back end demandée";
            break;
            default : throw new Exception ("La page n'existe pas");//On léve encore une exeption que s'il n'y a pas front ou back mais autre chose de marqué ds l'url, on affichera un message d'erreur.
        }
    }
} catch (Exception $e){
    $msg = $e->getMessage();
    echo $msg;
}