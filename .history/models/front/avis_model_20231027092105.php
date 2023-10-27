class AvisModel {
    private $dbh;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=garage;charset=utf8';
        $user = 'root';
        $password = '';

        try {
            $this->dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    public function getAllAvis() {
        $sql = "SELECT * FROM avis";
        $stmt = $this->dbh->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    // Ajoutez d'autres fonctions pour créer, mettre à jour et supprimer des avis si nécessaire.
}
