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

    if ($filters['kilometre']) {
        $sql .= " AND kilometre = :kilometre";
    }

    if ($filters['annee']) {
        $sql .= " AND annee = :annee";
    }

    if ($filters['prix']) {
        $sql .= " AND price <= :price";
    }

    // Prepare and execute the query
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($filters);

    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}
 }
