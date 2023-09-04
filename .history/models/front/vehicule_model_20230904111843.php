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

    if (isset($filters['famille'])) { //vérification des filtres et va ajouter au statement et va ajouter les AND 1 par 1
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

    if (isset($filters['limite')

    // Prepare and execute the query
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute($filters);

    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



    return $results;
}


 }

 

