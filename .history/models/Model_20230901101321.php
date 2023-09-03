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

    if (iss$filters['marque']) {
        $sql .= " AND marque = :marque";
    }

    if (iss$filters['kilometremin']) {
        $sql .= " AND kilometrage >= :kilometremin";
    }

    if (iss$filters['kilometremax']) {
        $sql .= " AND kilometrage <= :kilometremax";
    }

    if (iss$filters['anneemin']) {
        $sql .= " AND annee >= :anneemin";
    }
    if (iss$filters['anneemax']) {
        $sql .= " AND annee <= :anneemax";
    }

    if (iss$filters['prixmin']) {
        $sql .= " AND prix >= :prixmin";
    }

    if (iss$filters['prixmax']) {
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
