<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');



class Model
{
//Static = Indique que la variable appartient à la classe plutôt qu'à une instance spécifique de cette classe
    private static $pdo;

//Static, cette fonction appartient à la classe plutôt qu'à une instense spécifique de la classe
    private static function setBdd()
    {
    //instanciation de PDO
        self::$pdo = new PDO("mysql:host=localhost;dbname=garage;charset=utf8", "root", "");
      
//PDO::ATTR_ERRMODE est une constante qui spécifie l'attribut que l'on souhaite configurer. Dans ce cas, il s'agit de l'attribut de mode d'erreur.
//PDO::ERRMODE_WARNING est une constante qui indique que PDO doit émettre une alerte (E_WARNING) et générer une erreur lorsqu'une requête échoue.
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

//La méthode est déclarée avec le niveau d'accès protected, ce qui signifie qu'elle est accessible uniquement à l'intérieur de la classe où elle est définie et par ses classes dérivées (héritées).
    protected function getBdd()
    {
//Si la propriété $pdo est nulle, la méthode appelle la méthode statique setBdd() pour initialiser la connexion à la base de données.
        if (self::$pdo === null) {
            self::setBdd();
        }
//Retourne la connexion à la base de données ($pdo). Si la connexion n'était pas définie avant, elle le sera après l'appel à setBdd()
        return self::$pdo;
    }
//convertir les données qui sont au format tableau en format json
    public static function sendJSON($info)
    {
        header("Access-Control-Allow-Origin: *"); // À la place de * mettre le lien internet quand le site sera en ligne
        header("Content-Type: application/json");
        echo json_encode($info);
    }
}
