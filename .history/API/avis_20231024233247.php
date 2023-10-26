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
    $filters["nom"] = $_GET['famille'];
}

if (isset($_GET['marque'])) {
    $filters["marque"] = $_GET['marque'];
}

if (isset($_GET['kilometremin'])) {
    $filters['kilometremin'] = intval($_GET['kilometremin']);
}

if (isset($_GET['kilometremax'])) {
    $filters['kilometremax'] = intval($_GET['kilometremax']);
}

if (isset($_GET['anneemin'])) {
    $filters['anneemin']= intval($_GET['anneemin']);
}

if (isset($_GET['anneemax'])) {
    $filters['anneemax'] = intval($_GET['anneemax']);
}

if (isset($_GET['prixmin'])) {
    $filters['prixmin'] = intval($_GET['prixmin']);
}

if (isset($_GET['prixmax'])) {
    $filters['prixmax'] = intval($_GET['prixmax']);
}
   
if (isset($_GET['limite'])) {
    $filters['limite'] = intval($_GET['limite']);
}

$controller = new VehiculeController();
$controller->getCarsByFilters($filters);



}else {
    // echo"pas getrequests";
    
    http_response_code(404);
    echo json_encode(["error" => "endpoint not found"]);
}



?>