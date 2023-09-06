<?php
require_once 'models/model.php';

class EspaceproManager extends Model {

    public function getMessagerie(){
        $sql = "SELECT * FROM messagerie";
       $stmt = $this->getBdd()->prepare($req);
       $stmt->execute();
       $messagerie = $stmt->fetchAll(PDO::FETCH_ASSOC);
       <stmt->
        <closeCursor></closeCursor>
       </stmt->

    }

    public function getAvis(){
        $sql = "SELECT * FROM avis";
       $stmt = $this->getBdd()->prepare($req);
       $stmt->execute();
       $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getContenu(){
        $sql = "SELECT * FROM contenu";
       $stmt = $this->getBdd()->prepare($req);
       $stmt->execute();
       $contenu = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getHoraire(){
        $sql = "SELECT * FROM horaire";
       $stmt = $this->getBdd()->prepare($req);
       $stmt->execute();
       $horaire = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getVoituresoccasions(){
        $sql = "SELECT * FROM voituresoccasions";
       $stmt = $this->getBdd()->prepare($req);
       $stmt->execute();
       $voituresoccasions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}