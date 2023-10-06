<?php
ob_start();

require_once(__ROOT__.'\controllers\back\security.class.php');
require_once(__ROOT__.'\models\back\espacepro_manager.php');



// Utilisation du contrôleur pour afficher les voitures d'occasion
//$controller = new EspaceproController();
//$controller->visualisationvoituresoccasions();

class EspaceproController {

    private $espaceproManager;

    public function __construct() {
        $this->espaceproManager = new EspaceproManager();
    }

    //VISUALISATION
    public function visualisationvoituresoccasions()//Visualisation des voitures en stock
    {
        if (Securite::verifAccessSession()) {
            $vehicules = $this->espaceproManager->getVoituresoccasions(); // Utilisez $vehicules au lieu de $voituresoccasions
            require_once(__ROOT__ . '\views\commons\espacepro_vehicule_view.php');
          } //else {
            // throw new Exception("Vous n'avez pas accès à cette page");
          //}
    }


//SUPPRESSION
public function suppressionvoituresoccasions() {
    if (isset($_POST['idVehicule']) && is_numeric($_POST['idVehicule']) && !empty($_POST['idVehicule'])) {

        // Récupérer l'ID du véhicule en utilisant secureHTML
        //Convertit en INT car formulaire automatiquement en chaine de caract
        $idVehicule = (int) Securite::secureHTML($_POST['idVehicule']);
    

        // Vérifier si le véhicule existe dans la base de données
        if ($this->espaceproManager->compterVehicule($idVehicule) > 0) {
            // Le véhicule existe, donc nous pouvons le supprimer
            $this->espaceproManager->deleteDBvehicule($idVehicule);
           
           //Message d alerte session en relation avec template.php
            $_SESSION['alert'] = [
                "message" => "Le véhicule est supprimé",
                "type" => "alert-success"
            ];
        } else {
            // Le véhicule n'existe pas, afficher un message d'erreur
            $_SESSION['alert'] = [
                "message" => "Le véhicule n'a pas été trouvé",
                "type" => "alert-danger"
            ];
        }


        // Rediriger l'utilisateur
         header('Location: '.URL.'back/espacepro/visualisationvoituresoccasions');
        exit(); // Placé après la redirection
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}


 //MODIFICATION   
 public function modificationvoituresoccasions() {
    if (Securite::verifAccessSession()) {
        if (isset($_POST['idVehicule']) &&
            isset($_POST['imageVoiture']) &&
            isset($_POST['famille']) &&
            isset($_POST['marque']) &&
            isset($_POST['modele']) &&
            isset($_POST['annee']) &&
            isset($_POST['kilometrage']) &&
            isset($_POST['boitevitesse']) &&
            isset($_POST['energie']) &&
            isset($_POST['datecirculation']) &&
            isset($_POST['puissance']) &&
            isset($_POST['places']) &&
            isset($_POST['couleur']) &&
            isset($_POST['description']) &&
            isset($_POST['prix']) &&
            isset($_POST['imageCritere'])) {
            
            $idVehicule = (int) Securite::secureHTML($_POST['idVehicule']);
            $imageVoiture = Securite::secureHTML($_POST['imageVoiture']);
            $famille = Securite::secureHTML($_POST['famille']);
            $marque = Securite::secureHTML($_POST['marque']);
            $modele = Securite::secureHTML($_POST['modele']);
            $annee = Securite::secureHTML($_POST['annee']);
            $kilometrage = (int) Securite::secureHTML($_POST['kilometrage']);
            $boitevitesse = Securite::secureHTML($_POST['boitevitesse']);
            $energie = Securite::secureHTML($_POST['energie']);
            $datecirculation = Securite::secureHTML($_POST['datecirculation']);
            $puissance = Securite::secureHTML($_POST['puissance']);
            $places = (int) Securite::secureHTML($_POST['places']);
            $couleur = Securite::secureHTML($_POST['couleur']);
            $description = Securite::secureHTML($_POST['description']);
            $prix = (float) Securite::secureHTML($_POST['prix']);
            $imageCritere = Securite::secureHTML($_POST['imageCritere']);

            $this->espaceproManager->updateVehicule(
                $idVehicule, $imageVoiture, $famille, $marque, $modele, $annee,
                $kilometrage, $boitevitesse, $energie, $datecirculation,
                $puissance, $places, $couleur, $description, $prix, $imageCritere
            );

            $_SESSION['alert'] = [
                "message" => "Le véhicule a bien été modifié",
                "type" => "alert-success"
            ];
            header('Location: ' . URL . 'back/espacepro/visualisationvoituresoccasions');
            exit();
        } 
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

//CREATION
 public function creationTemplate(){
    if (Securite::verifAccessSession()) {
        require_once "views/espacepro_creation_view.php";
      } else {
         throw new Exception("Vous n'avez pas accès à cette page");
      }
 }


public function creationvoituresoccasions(){
    if (Securite::verifAccessSession()) {
        $imageVoiture =($_POST['imageVoiture']);
        $famille = ($_POST['famille']);
        $marque = ($_POST['marque']);
        $modele = ($_POST['modele']);
        $annee = ($_POST['annee']);
        $kilometrage = (int) ($_POST['kilometrage']);
        $boitevitesse = ($_POST['boitevitesse']);
        $energie = ($_POST['energie']);
        $datecirculation = ($_POST['datecirculation']);
        $puissance = ($_POST['puissance']);
        $places = (int) ($_POST['places']);
        $couleur = ($_POST['couleur']);
        $description = ($_POST['description']);
        $prix = (float) ($_POST['prix']);
        $imageCritere = ($_POST['imageCritere']);
       
        $idVehicule = $this->espaceproManager->createVehicule(
            $imageVoiture, $famille, $marque, $modele, $annee,
            $kilometrage, $boitevitesse, $energie, $datecirculation,
            $puissance, $places, $couleur, $description, $prix, $imageCritere);
        
        $_SESSION['alert'] = [
            "message" => "Le véhicule a bien été crée sous l'identifiant : " .$idVehicule,
            "type" => "alert-success"
        ];
        header('Location: ' . URL . 'back/espacepro/visualisationvoituresoccasions');
        exit();

      } else {
         throw new Exception("Vous n'avez pas accès à cette page");
      }
}




 //CONTACT       
//  public function messagerie(){ //Si l admin est loggé, on affichera la page sinon l évera une erreur
//         if(Securite::verifAccessSession()){
//             $messagerie = $this->espaceproManager->getMessagerie();
//             // print_r($messagerie); //Vérification si je reçois toutes les informations au niveau de ma requête
//             require_once "views/commons/espacepro_messagerie_view.php";
//         }else{
//             throw new Exception ("Vous n'avez pas accès à cette page");
//         }
//     }
    

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
    //     } else{
    //         throw new Exception ("Vous n'avez pas accès à cette page");
    //     }
    // }

}

ob_end_flush();

















