<?php

require_once(__ROOT__ . '\controllers\back\security.class.php');
require_once(__ROOT__ . '\models\back\espacepro_manager.php');
require_once(__ROOT__ . '\models\model.php');
require_once(__ROOT__ . '\datagestion\vehicule_data.php');

// Utilisation du contrôleur pour afficher les voitures d'occasion
$controller = new EspaceproController();
$controller->voituresoccasions();

class EspaceproController
{
    private $espaceproManager;

    public function __construct()
    {
        $this->espaceproManager = new EspaceproManager();
    }

    public function voituresoccasions()
    {
        session_start(); // Démarrer la session

        if (isset($_SESSION['user_id'])) { // Vérifier si l'utilisateur est connecté
            $vehicules = $this->espaceproManager->getVoituresoccasions();
            require_once(__ROOT__ . '\views\commons\espacepro_vehicule_view.php');
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}

?>
