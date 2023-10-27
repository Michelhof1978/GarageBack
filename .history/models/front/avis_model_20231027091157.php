<?php
// Aide pour un meilleur affichage des descriptions d'erreurs dans la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Classe de base pour le modèle
abstract class Model {
    private static $pdo;

    // Méthode pour configurer la connexion à la base de données
    private static function setBdd(){
        // Mettez vos informations de connexion à la base de données
        self::$pdo = new PDO("mysql:host=localhost;dbname=garage;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Méthode pour obtenir la connexion à la base de données
    protected function getBdd(){
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }

    // Méthode pour envoyer une réponse JSON
    public static function sendJSON($info){
        header("Access-Control-Allow-Origin: *"); // Autorise les requêtes depuis n'importe quel domaine (* pour tous, mettez le domaine final en production)
        header("Content-Type: application/json");
        echo json_encode($info);
    }
}
