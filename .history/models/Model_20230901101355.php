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

    if (isse$filters['marque']) {
        $sql .= " AND marque = :marque";
    }

    if (isse$filters['kilometremin']) {
        $sql .= " AND kilometrage >= :kilometremin";
    }

    if (isse$filters['kilometremax']) {
        $sql .= " AND kilometrage <= :kilometremax";
    }

    if (isse$filters['anneemin']) {
        $sql .= " AND annee >= :anneemin";
    }
    if (isse$filters['anneemax']) {
        $sql .= " AND annee <= :anneemax";
    }

    if (isse$filters['prixmin']) {
        $sql .= " AND prix >= :prixmin";
    }

    if (isse$filters['prixmax']) {
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
