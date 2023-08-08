<?php 
// 1. Création du fichier index.php dans lequel on définit une constante URL.
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas");// 2. Si l'URL est vide ou faussée, on lève une exception et on affiche une page d erreur.
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));//On récupère l'URL et on la filtre.
        if(empty($url[0]) || empty($url[1])) throw new Exception ("La page n'existe pas");
        switch($url[0]){
            case "front" : 
                switch($url[1]){
                    case "animaux": echo "données JSON des animaux demandées";
                    break;
                    case "animal": echo "données JSON de l'animal ".$url[2]." demandées";
                    break;
                    case "continents": echo "données JSON des continents demandées";
                    break;
                    case "familles": echo "données JSON des familles demandées";
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
