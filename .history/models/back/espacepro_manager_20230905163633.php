<?php
require_once 'models/model.php';

class EspacePro extends Model {

    public function getEspacePro($id){
        $sql = "SELECT * FROM espacepro WHERE id = :id";
        $req = $this->executerRequete($sql, array('id' => $id));
        $espacepro = $req->fetch();
        return $espacepro;
    }
}