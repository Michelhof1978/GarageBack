<?php
 class VehiculeModel{

private $dbh;
//Connexion en privé à la bdd
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

//Cette fonction est définie comme publique et prend un paramètre $filters qui est un tableau associatif contenant les filtres pour la recherche des voitures.
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

      if (isset($filters['limite'])) { // On va limiter le nombre de voitures à l'affichage
            $sql .= " LIMIT :limite";
         
      }

    // Prepare and execute the query
    $stmt = $this->dbh->prepare($sql);


   // Bind other parameters if they are set
if (isset($filters['famille'])) {
    $stmt->bindParam(':famille', $filters['famille'], PDO::PARAM_STR);
}

if (isset($filters['marque'])) {
    $stmt->bindParam(':marque', $filters['marque'], PDO::PARAM_STR);
}

if (isset($filters['kilometremin'])) {
    $stmt->bindParam(':kilometremin', $filters['kilometremin'], PDO::PARAM_INT);
}

if (isset($filters['kilometremax'])) {
    $stmt->bindParam(':kilometremax', $filters['kilometremax'], PDO::PARAM_INT);
}

if (isset($filters['anneemin'])) {
    $stmt->bindParam(':anneemin', $filters['anneemin'], PDO::PARAM_INT);
}

if (isset($filters['anneemax'])) {
    $stmt->bindParam(':anneemax', $filters['anneemax'], PDO::PARAM_INT);
}

if (isset($filters['prixmin'])) {
    $stmt->bindParam(':prixmin', $filters['prixmin'], PDO::PARAM_INT);
}

if (isset($filters['prixmax'])) {
    $stmt->bindParam(':prixmax', $filters['prixmax'], PDO::PARAM_INT);
}

if (isset($filters['limite'])) {
    $stmt->bindParam(':limite', $filters['limite'], PDO::PARAM_INT);
}

// Execute the query
$stmt->execute();




    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



    return $results;
}


 }



