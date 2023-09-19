<?php
require_once 'models/model.php';

class EspaceproManager extends Model {

    public function getMessagerie(){
        $sql = "SELECT * FROM messagerie";
       $stmt = $this->getBdd()->prepare($req);
       $stmt->execute();
       $messagerie = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
       $messagerie = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMessagerie(){
        $sql = "SELECT * FROM messagerie";
       $stmt = $this->getBdd()->prepare($req);
       $stmt->execute();
       $messagerie = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMessagerie(){
        $sql = "SELECT * FROM messagerie";
       $stmt = $this->getBdd()->prepare($req);
       $stmt->execute();
       $messagerie = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}