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

    protected function getBdd(){//Si pas de connexion avec setBdd ,getBdd va récupérer la connexion à la BDD
        if(self::$pdo === null){
            self::setBdd();
            return self::$pdo;
        }

        return self::$pdo;
    }

    //fonction pour convertir les datas en format JSON
    public static function sendJSON($info){
        header("Access-Control-Allow-Origin: *");//On autorise l'accés à l'API, cela evitera une CROSS error 
        header("Content-Type: application/json");//On précise que l'on va envoyer du JSON
        echo json_encode($info);
    }

    public function getfiltersdata(){

    }
}