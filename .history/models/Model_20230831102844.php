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
        $sql .= " AND kilometremin = :kilometremin";
    }

    if ($filters['kilometremax']) {
        $sql .= " AND kilometremax = :kilometremax";
    }

    if ($filters['anneemin']) {
        $sql .= " AND anneemin = :anneemin";
    }
    if ($filters['anneemax']) {
        $sql .= " AND anneemax = :anneemax";
    }

    if ($filters['prixmin']) {
        $sql .= " AND prixmin <= :prixmin";
    }

    if ($filters['prixmax']) {
        $sql .= " AND prixmax <= :prixmax";
    }
    // Prepare and execute the query
    $stmt = $this->->prepare($sql);
    $stmt->execute($filters);

    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}
 }
