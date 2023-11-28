<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');



class Model
{

    private static $pdo;


    private static function setBdd()
    {
        self::$pdo = new PDO("mysql:host=localhost;dbname=garage;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }

    public static function sendJSON($info)
    {
        header("Access-Control-Allow-Origin: *"); // À la place de * mettre le lien internet quand le site sera en ligne
        header("Content-Type: application/json");
        echo json_encode($info);
    }
}
