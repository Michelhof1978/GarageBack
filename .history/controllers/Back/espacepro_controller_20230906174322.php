<?php

require_once(__ROOT__.'\controllers\back\security.class.php');
require_once(__ROOT__.'\models\back\espacepro_manager.php');
require_once(__ROOT__.'\models\model.php');
require_once(__ROOT__.'\datagestion\vehicule_data.php');


class EspaceproController{

    public function __construct() {
        $this->espaceproManager = new EspaceproManager();
    }

    public function voituresoccasions() {
        if (Securite::verifAccessSession()) {
            $vehicules = $this->espaceproManager->getVehicules();
            require_once(__ROOT__ . '\views\commons\espacepro_vehicule_view.php');
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}

$controller = new EspaceproController();
$controller->voituresoccasions();
?>
Vue (espacepro_vehicule_view.php) :

php
Copy code
<?php ob_start(); ?>
<table class="table">
    <thead>
        <tr>
            <!-- Vos en-têtes de colonnes ici -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicules as $vehicule): ?>
            <tr>
                <!-- Vos données de véhicule ici -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require_once(__ROOT__ . '\views\commons\template.php');
?>
Maintenant, le code reflète correctement le nom de votre table "vehicule". Assurez-vous d'avoir effectué ces modifications pour éviter toute confusion.






        // Utilisation du contrôleur pour afficher les voitures d'occasion
        $controller = new EspaceproController();
        $controller->vehicule();


    // public function messagerie(){ //Si l admin est loggé, on affichera la page sinon l évera une erreur
    //     if(Securite::verifAccessSession()){
    //         $messagerie = $this->espaceproManager->getMessagerie();
    //         // print_r($messagerie); //Vérification si je reçois toutes les informations au niveau de ma requête
    //         require_once "views/commons/espacepro_messagerie_view.php";
    //     }else{
    //         throw new Exception ("Vous n'avez pas accès à cette page");
    //     }
    // }
    

    // public function avis(){
    //         if(Securite::verifAccessSession()){
    //             $avis = $this->espaceproManager->getAvis();
    //             // print_r($avis);
    //             require_once "views/commons/espacepro_avis_view.php";
    //         }else{
    //             throw new Exception ("Vous n'avez pas accès à cette page");
    //         }
    // }

    // public function contenu(){

    //     if(Securite::verifAccessSession()){
    //         $contenu = $this->espaceproManager->getContenu();
    //          // print_r($contenu);
    //         require_once "views/commons/espacepro_contenu_view.php";
    //     }else{
    //         throw new Exception ("Vous n'avez pas accès à cette page");
    //     }

    // }

    // public function horaire(){
    //     if(Securite::verifAccessSession()){
    //         $horaire = $this->espaceproManager->getHoraire();
    //          // print_r($horaire);
    //         require_once "views/commons/espacepro_horaire_view.php";
    //     }else{
    //         throw new Exception ("Vous n'avez pas accès à cette page");
    //     }
    // }





















