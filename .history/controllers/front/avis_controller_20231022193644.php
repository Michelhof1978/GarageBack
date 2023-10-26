<?php
require_once 'model.php';

class AvisController extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function ajouterAvis($nom, $prenom, $contenu, $note) {
        $sql = "INSERT INTO avis (nom, prenom, contenu, note) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            throw new Exception("Erreur de préparation de la requête : " . $this->connection->error);
        }

        $stmt->bind_param("sssi", $nom, $prenom, $contenu, $note);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAvis() {
        $avis = array();
        $result = $this->connection->query("SELECT * FROM avis");

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $avis[] = $row;
            }

            return $avis;
        }

        return false;
    }
}
