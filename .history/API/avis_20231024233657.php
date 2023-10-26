<?php


$methode = $_SERVER['REQUEST_METHOD']; //Extrait la méthode de la requête, faire certaines instructions suivant la méthode
$uri = $_SERVER['REQUEST_URI']; // URI = permet d'identification du chemin
// echo $uri;
  define('__ROOT__', dirname(dirname(__FILE__)));

  require_once(__ROOT__.'\controllers\front\avis_controller.php');
    // echo $methode;

if ($methode === "GET"){

    
// echo "getrequest";

    $avis = array();

if (isset($_GET['nom'])) {
    $avis["nom"] = $_GET['nom'];
}

if (isset($_GET['prenom'])) {
    $avis["prenom"] = $_GET['prenom'];
}

if (isset($_GET['note'])) {
    $avis['note'] = intval($_GET['note']);
}

if (isset($_GET['commentaire'])) {
    $avis['commentaire'] = intval($_GET['commentaire']);
}

if (isset($_GET['anneemin'])) {
    $filters['anneemin']= intval($_GET['anneemin']);
}


}
   
if (isset($_GET['limite'])) {
    $filters['limite'] = intval($_GET['limite']);
}

$controller = new AvisController();
$controller->get($filters);



}else {
    // echo"pas getrequests";
    
    http_response_code(404);
    echo json_encode(["error" => "endpoint not found"]);
}



?>