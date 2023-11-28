<?php
//FILTRES RECHERCHE

//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

//classe VehiculeModel qui va gérer l'accès aux données des véhicules
class VehiculeModel
{
//Connexion en privé à la bdd
    private $dbh;
    

//Dans le constructeur de la classe, une connexion à la base de données est établie en utilisant l'extension PDO (PHP Data Objects)
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
    public function getCarsByFilters($filters)
    {

// construire la requête SQL de base qui récupère toutes les colonnes (*) de la table "vehicule". La condition WHERE 1 est utilisée pour que la requête soit toujours vraie, même s'il n'y a pas de filtres spécifiés.
        $sql = "SELECT * FROM vehicule WHERE 1";

//vérification des filtres et va ajouter au statement et va ajouter les AND 1 par 1
        if (isset($filters['famille'])) { 
            
// divise la valeur de ce filtre en un tableau en utilisant la virgule comme séparateur
            $values = explode(",", $filters['famille']);

//La fonction implode() en PHP est utilisée pour concaténer les éléments d'un tableau en une seule chaîne de caractères. 
//Les emplacements nommés générés sont ensuite combinés en une chaîne unique séparée par des virgules à l'aide de la fonction implode. 
//Cette chaîne est stockée dans la variable $namedPlaceholders.
            $namedPlaceholders = implode(', ', array_map(function ($value) {
//str_replace va supprimer les virgules de chaque valeur et l'a transformera en chaine de caractère, la valeur sera ensuite concaténée
                return ':value_' . str_replace(',', '', $value);
            }, $values));

            // echo $namedPlaceholders;
            $sql .= " AND famille IN ($namedPlaceholders)";

            // echo $sql;


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


//Ajoute des conditions à la requête SQL en fonction des filtres spécifiés dans le tableau $filters
//Liaison des valeurs des filtres aux paramètres de la requête SQL, puis exécute la requête et récupère les résultats
        if (isset($filters['famille'])) {

//La fonction `explode()` en PHP est utilisée pour diviser une chaîne de caractères en un tableau de sous-chaînes, en utilisant un délimiteur spécifié
            $values = explode(",", $filters['famille']);
            foreach ($values as $value) {
 // echo ':value_' . str_replace(',', '', $value);
                $stmt->bindValue(':value_' . str_replace(',', '', $value), $value, PDO::PARAM_STR);
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

//PDO::FETCH_ASSOC est un mode de récupération qui indique à PDO de retourner un tableau 
//associatif où les noms des colonnes de la base de données sont utilisés comme clés pour
// les valeurs correspondantes. Chaque ligne du tableau résultant représente un
// enregistrement de la base de données.
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



        return $results;
    }
}
