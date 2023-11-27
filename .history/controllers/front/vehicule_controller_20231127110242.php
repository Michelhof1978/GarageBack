<?php
// Aide pour meilleur affichage des descriptions des erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(__ROOT__ . '\models\front\vehicule_model.php');

//Définit une classe VehiculeController qui contiendra les méthodes pour gérer les requêtes liées aux véhicules.
class VehiculeController
{
    private $apiManager;

//Dans le constructeur de la classe, une instance de la classe VehiculeModel est créée. 
//Le contrôleur utilise les fonctionnalités fournies par le modèle pour interagir avec les données des véhicules.
    public function __construct()
    {
        $this->apiManager = new VehiculeModel();
    }

//Va prendre des filtres en entrée
    public function getCarsByFilters($filtres)
    {
//Appelle la méthode getCarsByFilters du modèle VehiculeModel pour obtenir les données des véhicules en fonction des filtres fournis.
        $cars = $this->apiManager->getCarsByFilters($filtres);

        //Configuration  entêtes avant d'envoyer la réponse
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");

//Convertit les résultats (un tableau d'objets représentant des véhicules) en format JSON et les renvoie comme réponse à la requête
        echo json_encode($cars);
    }
}
