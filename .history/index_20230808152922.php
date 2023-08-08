<?php 
// 1. Création du fichier index.php dans lequel on définit une constante URL.
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas");//Si l'URL est vide ou faussée, on lève une exception et on affiche une page d erreur.
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));//On récupère l'URL et on la filtre pour pouvoir la mieux sécuriser.
        if(empty($url[0]) || empty($url[1])) throw new Exception ("La page n'existe pas");//On va vérifier que l'URL contient bien 2 paramètres en ajoutant une auytre exeption.Si à l'indice 0 ou 1 de l'url après le / n'existe pas aprés la page front ou back, ds ce cas la je vais lever une erreur.
        switch($url[0]){
            case "front" : 
                switch($url[1]){
                    case "accueil": echo "page accueil";
                    break;
                    case "prestations": echo " page prestations".$url[2]." demandées";
                    break;
                    case "voituresFiltre": echo "page voituresFiltre";
                    break;
                    case "voitureFiche": echo "page voitureFiche";
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
            default : throw new Exception ("La page n'existe pas");
        }
    }
} catch (Exception $e){
    $msg = $e->getMessage();
    echo $msg;
}
