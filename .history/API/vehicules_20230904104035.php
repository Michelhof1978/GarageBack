<?php
// require_once(__ROOT__.'..\controllers\vehicules_controller.php');
$methode = $_SERVER['REQUEST_METHOD']; //Extrait la méthode de la requête, faire certaines instructions suivant la méthode
$uri = $_SERVER['REQUEST_URI']; // URI = permet d'identification du chemin
echo $uri;
  define('__ROOT__', dirname(dirname(__FILE__)));

  require_once(__ROOT__.'\controllers\front\vehicule_controller.php');

    
if ($methode = "GET" && $uri = "/GarageBack/API/vehicules.php"){

}

// Création du controlleur du côté front qui va regrouper toutes nos routes



?>