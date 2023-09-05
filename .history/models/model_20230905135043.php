<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');
abstract class Model {
    private static $pdo;

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

    public static function sendJSON($info){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        echo json_encode($info);
    }
}