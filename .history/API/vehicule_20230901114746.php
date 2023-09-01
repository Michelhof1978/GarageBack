<?php
  require_once("controllers/vehicule_controller.php");
 

    
    public function getCarsByFilters($filters) {
      
        $sql = "SELECT * FROM vehicule WHERE 1";

        if (isset($filters['famille'])) {
            $sql .= " AND famille = :famille";
        }
    
        if (isset($filters['marque'])) {
            $sql .= " AND marque = :marque";
        }
    
        if (isset($filters['kilometremin'])) {
            $sql .= " AND kilometrage >= :kilometremin";
        }
    
        if (isset($filters['kilometremax'])) {
            $sql .= " AND kilometrage <= :kilometremax";
        }
    
        if (isset($filters['anneemin'])) {
            $sql .= " AND annee >= :anneemin";
        }
        if (isset($filters['anneemax'])) {
            $sql .= " AND annee <= :anneemax";
        }
    
        if (isset($filters['prixmin'])) {
            $sql .= " AND prix >= :prixmin";
        }
    
        if (isset($filters['prixmax'])) {
            $sql .= " AND prix <= :prixmax";
        }
        // Prepare and execute the query
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($filters);
    
        // Fetch results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    }
     }
    

// Création du controlleur du côté front qui va regrouper toutes nos routes
class Controller{
    //Crérera automatiquement une instance de classe APIManager et la stockera ds la propriété $apiManager. Cela sera utile pour gérer le JSON par la suite.
    private $apiManager;//propriété privée (accessible uniquement à l'intérieur de cette classe) qui va contenir une instance de la classe APIManager.

    public function __construct(){
        $this->apiManager = new Model();
    }

public function getCarsByFilters($filtres){
    $cars=$this->apiManager->getCarsByFilters($filtres);
    header('Content-Type: application/json');
        echo json_encode($cars);
}
}


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
   
$controller = new Controller();

$controller->getCarsByFilters($filters);



?>