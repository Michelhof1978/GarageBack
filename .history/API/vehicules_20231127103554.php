<?php
//Va permettre à REACT et PHP de communiquer entre eux par différentes  routes
//Cela permettra d'éviter que les pages se rechargent
// Va traiter les requêtes HTTP entrantes et effectue différentes actions en fonction de la méthode de la requête et des paramètres fournis dans l'URI

////$methode contient la méthode de la requête HTTP (GET, POST, etc.).
$methode = $_SERVER['REQUEST_METHOD']; 

//$uri contient l'URI (Uniform Resource Identifier) de la requête, qui identifie la ressource demandée.
$uri = $_SERVER['REQUEST_URI']; // URI = permet d'identification du chemin
// echo $uri;

//définit une constante __ROOT__ qui représente le chemin absolu du répertoire racine du projet
  define('__ROOT__', dirname(dirname(__FILE__)));

  //Inclut le fichier contenant le contrôleur des véhicules.
  require_once(__ROOT__.'\controllers\front\vehicule_controller.php');
    // echo $methode;


//Si la méthode de la requête est GET, le code traite la requête.
if ($methode === "GET"){   
// echo "getrequest";

//Les paramètres GET de l'URI sont extraits et stockés dans un tableau associatif $filters
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

//Création d'une instance du contrôleur des véhicules et appel de la méthode appropriée 
//Un objet du contrôleur des véhicules est créé, et la méthode getCarsByFilters est appelée avec les filtres extraits
$controller = new VehiculeController();
$controller->getCarsByFilters($filters);


//Si la méthode de la requête n'est pas GET, le script renvoie une réponse HTTP 404 (not found) avec un message d'erreur au format JSON.
}else {
    // echo"pas getrequests";
    
    http_response_code(404);
    echo json_encode(["error" => "endpoint not found"]);
}



?>