<?php
class Model{

    private $dbh;
    
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=garage;charset=utf8';
        $user = 'root';
        $password = '';
        
        try {
            // Connexion à la base de données
            $this->dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
        
    }
    
    public function getCarsByFilters($filters) {
        // Construct the SQL query based on filters
        $sql = "SELECT * FROM vehicule WHERE 1";
    
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


$marque = $_GET['marque'];
$kilometremin = $_GET['kilometremin'];
$kilometremax = $_GET['kilometremax'];
$anneemin = $_GET['anneemin'];
$anneemax = $_GET['anneemax'];
$prixmin = $_GET['prixmin'];
$prixmax = $_GET['prixmax'];

$filters = array();
if (isset($marque)) {
    $filters["marque"] = $marque;
}

if (isset($kilometremin)) {
    $filters['kilometremin'] = $kilometremin;
}

if (isset($filters['kilometremax'])) {
    $filters['kilometremax'] = $
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
   
$controller = new Controller();

$controller->getCarsByFilters($filters);



?>