<?php
//FILTRES RECHERCHE

//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');


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

//fonction  publique qui prend un paramètre $filters qui est un tableau associatif contenant les filtres pour la recherche des voitures.
public function getCarsByFilters($filters) { 

    // construire la requête SQL de base qui récupère toutes les colonnes (*) de la table "vehicule". La condition WHERE 1 est utilisée pour que la requête soit toujours vraie, même s'il n'y a pas de filtres spécifiés.
    $sql = "SELECT * FROM vehicule WHERE 1"; 

    if (isset($filters['famille'])) {//vérification des filtres et va ajouter au statement et va ajouter les AND 1 par 1
        $values = explode(",", $filters['famille']);
        $namedPlaceholders = implode(', ', array_map(function ($value)  {
            
            return ':value' . str_replace(',', '', $value);
        }, $values));

        echo $namedPlaceholders;
        // $sql .= " AND famille IN (" .  $namedPlaceholders  .")";
        
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

    // Preparation et execution de la requête sql
    $stmt = $this->dbh->prepare($sql);



   //Liaison des valeurs des filtres aux paramètres de la requête SQL, puis exécute la requête et récupère les résultats
if (isset($filters['famille'])) {
    $values = explode(",", $filters['famille']);
    foreach ($values as $value) {
        // echo ':value_' . str_replace(',', '', $value);
        // $stmt->bindParam(':value_' . str_replace(',', '', $value), $value, PDO::PARAM_STR);
   
    }
    
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


    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



    return $results;
}


 }


