<?php
 class VehiculeModel{

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
    $sql = "SELECT * FROM vehicule WHERE 1"; //1 pour que ça soit toujours vrai même si pas de filtres

    //vérification des filtres et va ajouter au statement et va ajouter les AND 1 par 1
    // Prepare and execute the query
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute($filters);

    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



    return $results;
}


 }

 

