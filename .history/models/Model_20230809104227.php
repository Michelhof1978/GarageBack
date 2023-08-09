<?php
abstract class Model{
    //On va créer une instance à PDO, il y aura qu'une seul instance pour toute la BDD
    private static $pdo;

    private static function setBdd(){//On va se connecter à la BDD
        self::$pdo = new PDO("mysql:host=localhost;dbname=garage;charset=utf8","root","");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);//On va afficher les erreurs SQL
    }

    protected function getBdd(){//Si pas de connexion avec setBdd ,get va récupérer la connexion à la BDD
        if(self::$pdo === null){
            self::setBdd();
            return self::$pdo;
        }
    }
}