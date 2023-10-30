<?php


class PrestationManager {
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

    public function getDBPrestations() {
        $stmt = $this->dbh->prepare('SELECT * FROM prestation');
        $stmt->execute();
        $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $prestations;
    }
}
