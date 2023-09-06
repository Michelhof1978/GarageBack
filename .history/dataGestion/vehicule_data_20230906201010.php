public function getVoituresoccasions(){
    $sql = "SELECT * FROM vehicule"; // Utilisez le nom de table correct ici
    $stmt = $this->getBdd()->prepare($sql);
    $stmt->execute();
    $voituresoccasions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $voituresoccasions;
}
