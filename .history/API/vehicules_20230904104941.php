<?php
// require_once(__ROOT__.'..\controllers\vehicules_controller.php');
$methode = $_SERVER['REQUEST_METHOD']; //Extrait la méthode de la requête, faire certaines instructions suivant la méthode
$uri = $_SERVER['REQUEST_URI']; // URI = permet d'identification du chemin
// echo $uri;
  define('__ROOT__', dirname(dirname(__FILE__)));

  require_once(__ROOT__.'\controllers\front\vehicule_controller.php');
    // echo $methode;
if ($methode === "GET"){

    

echo "getrequest";
    $filters = array();

if (isset($_GET['famille'])) {
    $filters["famille"] = $_GET['famille'];
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
    $filters['anneemin']= intval($_GET['annemin']);
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
   
$controller = new VehiculeController();

// $controller->getCarsByFilters($filters);



}else {
    echo"pas getrequests";
}



// Création du controlleur du côté front qui va regrouper toutes nos routes



?>