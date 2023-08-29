<?php
require_once("models/front/API.manager.php");
require_once("models/Model.php");

// Création du controlleur du côté front qui va regrouper toutes nos routes
class APIController{
    //Crérera automatiquement une instance de classe APIManager et la stockera ds la propriété $apiManager. Cela sera utile pour gérer le JSON par la suite.
    private $apiManager;//propriété privée (accessible uniquement à l'intérieur de cette classe) qui va contenir une instance de la classe APIManager.

    public function __construct(){
        $this->apiManager = new APIManager();
    }
//------------------------------------------------------------------------------------------

    public function getAccueil(){
       
        echo "accueil";
    }

    public function getPrestations($idPrestations){//On récupére en paramétre 2 de l'url l'Id
        $prestations = $this->apiManager->getDBPrestations();//On va chercher la méthode getVoiturefiche() de la classe APIManager et on la stocke ds la variable $voiturefiche.
        Model::sendJSON($prestations);//On appelle la fonction ds model
       
        // echo "<pre>";
        // print_r($prestations);
        // echo "</pre>";
    }

    public function getVoitureS() {
        $filtres = [
            'marque' => $_GET['marque'] ?? null,
            'famille' => $_GET['famille'] ?? null,
            'annee' => $_GET['annee'] ?? null,
            'kilometrage' => $_GET['kilometrage'] ?? null
          
        ];

        $resultats = $this->apiManager->getVoiturefiche($filtres);
        Model::sendJSON($resultats);
    }


    // Supposons que vous ayez déjà inclus vos fichiers et initialisé la connexion à la base de données

    // public function getVehiculeDetails($id) {
    //     $req = "SELECT * FROM vehicule WHERE idVehicule = :id";
    //     $stmt = $this->apiManager->getBdd()->prepare($req);
    //     $stmt->bindParam(":id", $id);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function handleGetVehiculeDetails() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //         if (isset($_GET['id'])) {
    //             $id = $_GET['id'];
                
    //             $vehicule = $this->getVehiculeDetails($id);
                
    //             if ($vehicule) {
    //                 header('Content-Type: application/json');
    //                 echo json_encode($vehicule);
    //                 exit();
    //             } else {
    //                 http_response_code(404);
    //                 echo json_encode(['error' => 'Véhicule non trouvé']);
    //                 exit();
    //             }
    //         } else {
    //             http_response_code(400);
    //             echo json_encode(['error' => 'ID du véhicule manquant']);
    //             exit();
    //         }
    //     }
    // }






   
        

    public function getContact(){
        $contact = $this->apiManager->getDBContact(); // Appel de la méthode pour récupérer les avis depuis le modèle
        Model::sendJSON($contact);
        
        // echo "<pre>";
        // print_r($contact);
        // echo "</pre>";
    }

    public function getAvis(){
        $avis = $this->apiManager->getDBAvis(); // Appel de la méthode pour récupérer les avis depuis le modèle
        Model::sendJSON($avis);
        // echo "<pre>";
        // print_r($avis);
        // echo "</pre>";
    }

    // public function getGarage(){
    //     $avis = $this->apiManager->getDBGarage(); // Appel de la méthode pour récupérer les avis depuis le modèle
    //     echo "<pre>";
    //     print_r($garage);
    //     echo "</pre>";
    // }
}


 //VOIR LES DONNEES SOUS FORMAT TABLEAU
    // public function getVoiturefiche($idVoiturefiche) {
    //     $voiturefiche = $this->apiManager->getDBVoiturefiche();
    //     $selectedVoiture = null;
    
    //     foreach ($voiturefiche as $voiture) {
    //         if ($voiture['idVehicule'] == $idVoiturefiche) {
    //             $selectedVoiture = $voiture;
    //             break;
    //         }
    //     }
    
    //     echo "<table border='1'>";
    //     foreach ($selectedVoiture as $key => $value) {
    //         echo "<tr><td>$key</td><td>$value</td></tr>";
    //     }
    //     echo "</table>";
    // }
      