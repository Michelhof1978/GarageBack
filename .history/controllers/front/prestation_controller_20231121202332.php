<?php
// prestation_controller.php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(__ROOT__ . '/models/front/prestation_model.php');

class PrestationController
{
    private $prestationManager;

    public function __construct()
    {
        $this->prestationManager = new PrestationManager();
    }

    public function getAllPrestations()
    {
        return $this->prestationManager->getDBPrestations();
    }
}
