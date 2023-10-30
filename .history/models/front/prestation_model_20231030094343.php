<?php
// PrestationModel.php

class PrestationModel {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function getDBPrestations() {
        $stmt = $this->dbh->prepare('SELECT * FROM prestation');
        $stmt->execute();
        $prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $prestations;
    }
}
