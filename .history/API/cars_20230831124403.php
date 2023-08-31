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
    
        if ($filters['marque']) {
            $sql .= " AND marque = :marque";
        }
    
        if ($filters['kilometremin']) {
            $sql .= " AND kilometrage >= :kilometremin";
        }
    
        if (isset($filters['kilometremax']) {
            $sql .= " AND kilometrage <= :kilometremax";
        }
    
        
        // Prepare and execute the query
        $stmt = $this->dbh->prepare($sql);
        

        return $sql;
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
    
        echo $cars;
}
}

$filters = ["marque"=>"citroen", "kilometremin"=>0, "kilometremax"=>200000];

   
$controller = new Controller();

$controller->getCarsByFilters($filters);



?>