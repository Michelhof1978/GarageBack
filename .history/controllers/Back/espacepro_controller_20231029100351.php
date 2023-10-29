<?php
ob_start();

require_once(__ROOT__.'\controllers\back\security.class.php');
require_once(__ROOT__.'\models\back\espacepro_manager.php');
require_once(__ROOT__.'\controllers\back\regles_utiles.php');



class EspaceproController {

    private $espaceproManager;

    public function __construct() {
        $this->espaceproManager = new EspaceproManager();
    }

// CONTROLLER VEHICULE

   // VISUALISATION VEHICULE
public function visualisationvoituresoccasions() {
    if (Securite::verifAccessSession()) {
        $vehicules = $this->espaceproManager->getVoituresoccasions();
        require_once(__ROOT__ . '/views/commons/espacepro_vehicule_view.php');
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// SUPPRESSION VEHICULE
public function suppressionvoituresoccasions() {
    if (isset($_POST['idVehicule']) && is_numeric($_POST['idVehicule']) && !empty($_POST['idVehicule'])) {
        $idVehicule = (int) Securite::secureHTML($_POST['idVehicule']);
        $imageVoiture = $this->espaceproManager->getimageVoiture($idVehicule);
        $imageCritere = $this->espaceproManager->getimageCritere($idVehicule);

        if (file_exists("public/images/" . $imageVoiture)) {
            unlink("public/images/" . $imageVoiture);
        }

        if (file_exists("public/images/" . $imageCritere)) {
            unlink("public/images/" . $imageCritere);
        }

        if ($this->espaceproManager->compterVehicule($idVehicule) > 0) {
            $this->espaceproManager->deleteDBvehicule($idVehicule);

            $_SESSION['alert'] = [
                "message" => "Le véhicule est supprimé",
                "type" => "alert-success"
            ];
        } else {
            $_SESSION['alert'] = [
                "message" => "Le véhicule n'a pas été trouvé",
                "type" => "alert-danger"
            ];
        }

        header('Location: ' . URL . 'back/espacepro/visualisationvoituresoccasions');
        exit();
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// MODIFICATION VEHICULE
public function modificationvoituresoccasions() {
    if (Securite::verifAccessSession()) {
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
        $updated_at = date("Y-m-d H:i:s");

        $this->espaceproManager->updateVehicule(
            $idVehicule, $imageVoiture, $famille, $marque, $modele, $annee,
            $kilometrage, $boitevitesse, $energie, $datecirculation,
            $puissance, $places, $couleur, $description, $prix, $imageCritere, $updated_at
        );

        $_SESSION['alert'] = [
            "message" => "Le véhicule a bien été modifié",
            "type" => "alert-success"
        ];

        header('Location: ' . URL . 'back/espacepro/visualisationvoituresoccasions');
        exit();
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// CREATION TEMPLATE CREATION VEHICULE
public function creationTemplateVehicule() {
    if (Securite::verifAccessSession()) {
        require_once "views/commons/espacepro_ajout_voitures_view.php";
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// CREATION VEHICULE

public function creationvoituresoccasions() {
    if (Securite::verifAccessSession()) {
        try {
            $imageVoiture = "";
            if (isset($_FILES['imageVoiture']['size']) && $_FILES['imageVoiture']['size'] > 0) {
                $repertoire = "public/images/";
                $imageVoiture = ajoutImage($_FILES['imageVoiture'], $repertoire);
            }

            $imageCritere = "";
            if (isset($_FILES['imageCritere']['size']) && $_FILES['imageCritere']['size'] > 0) {
                $repertoire = "public/images/";
                $imageCritere = ajoutImage($_FILES['imageCritere'], $repertoire);
            }

            $famille = isset($_POST['famille']) ? $_POST['famille'] : '';
            $marque = isset($_POST['marque']) ? $_POST['marque'] : '';
            $modele = isset($_POST['modele']) ? $_POST['modele'] : '';
            $annee = isset($_POST['annee']) ? (int) $_POST['annee'] : 0;
            $kilometrage = isset($_POST['kilometrage']) ? (int) $_POST['kilometrage'] : 0;
            $boitevitesse = isset($_POST['boitevitesse']) ? $_POST['boitevitesse'] : '';
            $energie = isset($_POST['energie']) ? $_POST['energie'] : '';
            $datecirculation = isset($_POST['datecirculation']) ? $_POST['datecirculation'] : '';
            $puissance = isset($_POST['puissance']) ? (int) $_POST['puissance'] : 0;
            $places = isset($_POST['places']) ? (int) $_POST['places'] : 0;
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $prix = isset($_POST['prix']) ? (float) $_POST['prix'] : 0;
            $created_at = date('Y-m-d H:i:s'); // Date actuelle

            $idVehicule = $this->espaceproManager->createVehicule(
                $imageVoiture, $famille, $marque, $modele, $annee,
                $kilometrage, $boitevitesse, $energie, $datecirculation,
                $puissance, $places, $couleur, $description, $prix, $imageCritere, $created_at
            );

            $_SESSION['alert'] = [
                "message" => "Le véhicule a bien été créé sous l'identifiant : " . $idVehicule,
                "type" => "alert-success"
            ];

            header('Location: ' . URL . 'back/espacepro/creationtemplatevehicule');
            exit();
        } catch (Exception $e) {
            $_SESSION['alert'] = [
                "message" => "Erreur lors de la création du véhicule : " . $e->getMessage(),
                "type" => "alert-danger"
            ];
            header('Location: ' . URL . 'back/espacepro/creationtemplatevehicule');
            exit();
        }
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}


        
// FIN CONTROLLER VEHICULE
// ______________________________________________________________________________________________________________

//CONTROLLER AVIS

// VISUALISATION AVIS
public function visualisationavis()
{
    if (Securite::verifAccessSession()) {
        $avis = $this->espaceproManager->getAvis(); 
        require_once(__ROOT__ . '/views/commons/espacepro_avis_view.php');
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// SUPPRESSION AVIS
public function suppressionavis()
{
    if (isset($_POST['idAvis']) && is_numeric($_POST['idAvis']) && !empty($_POST['idAvis'])) {
        $idAvis = (int) Securite::secureHTML($_POST['idAvis']);
        if ($this->espaceproManager->compterAvis($idAvis) > 0) {
            $this->espaceproManager->deleteDBavis($idAvis);
            $_SESSION['alert'] = [
                "message" => "L'avis a été supprimé",
                "type" => "alert-success"
            ];
        } else {
            $_SESSION['alert'] = [
                "message" => "L'avis n'a pas été trouvé",
                "type" => "alert-danger"
            ];
        }
        header('Location: ' . URL . 'back/espacepro/visualisationavis');
        exit();
    } else {
        throw new Exception("Requête invalide pour la suppression d'avis");
    }
}

// MODIFICATION AVIS
public function modificationavis($idAvis)
{
    if (Securite::verifAccessSession()) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                isset($idAvis) && // Vous recevez l'ID de l'avis en argument de la fonction
                isset($_POST['nom']) &&
                isset($_POST['prenom']) &&
                isset($_POST['note']) &&
                isset($_POST['commentaire'])
            ) {
                $nom = Securite::secureHTML($_POST['nom']);
                $prenom = Securite::secureHTML($_POST['prenom']);
                $note = (float) $_POST['note']; // Utilisez float pour traiter les décimales
                $commentaire = Securite::secureHTML($_POST['commentaire']);
                $updated_at = date("Y-m-d H:i:s"); // Obtenez la date et l'heure actuelles

                $this->espaceproManager->updateAvis(
                    $idAvis, $nom, $prenom, $note, $commentaire, $updated_at
                );

                $_SESSION['alert'] = [
                    "message" => "L'avis a bien été modifié",
                    "type" => "alert-success"
                ];
                header('Location: ' . URL . 'back/espacepro/visualisationavis');
                exit();
            } else {
                throw new Exception("Données de modification d'avis manquantes");
            }
        } else {
            throw new Exception("Requête invalide pour la modification d'avis");
        }
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// CREATION TEMPLATE AJOUT AVIS
public function creationTemplateAvis()
{
    if (Securite::verifAccessSession()) {
        require_once "views/commons/espacepro_ajout_avis_view.php";
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// CREATION  AVIS
public function creationavis()
{
    if (Securite::verifAccessSession()) {
        try {
            if (
                isset($_POST['nom']) &&
                isset($_POST['prenom']) &&
                isset($_POST['note']) &&
                isset($_POST['commentaire']) &&
                isset($_POST['created_at'])
            ) {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $note = (int)$_POST['note'];
                $commentaire = $_POST['commentaire'];
                $created_at = $_POST['created_at'];


                // Vérifier que la note est au maximum 5
                if ($note <= 5) {
                    $commentaire = $_POST['commentaire'];
                    $created_at = date('Y-m-d H:i:s'); // Date actuelle

                    $idAvis = $this->espaceproManager->createAvis(
                        $nom, $prenom, $note, $commentaire, $created_at
                    );

                    if ($idAvis > 0) { // Vérifier si l'avis a été créé avec succès
                        $_SESSION['alert'] = [
                            "message" => "L'avis a bien été créé sous l'identifiant : " . $idAvis,
                            "type" => "alert-success"
                        ];
                    } else {
                        $_SESSION['alert'] = [
                            "message" => "Erreur lors de la création de l'avis : l'identifiant est incorrect",
                            "type" => "alert-danger"
                        ];
                    }
                } else {
                    $_SESSION['alert'] = [
                        "message" => "Erreur lors de la création de l'avis : la note doit être au maximum à 5",
                        "type" => "alert-danger"
                    ];
                }

                header('Location: ' . URL . 'back/espacepro/creationtemplateavis');
                exit();
            } else {
                throw new Exception("Merci de remplir tous les champs !");
            }
        } catch (Exception $e) {
            $_SESSION['alert'] = [
                "message" => "Erreur lors de la création de l'avis : " . $e->getMessage(),
                "type" => "alert-danger"
            ];
            header('Location: ' . URL . 'back/espacepro/creationtemplateavis');
            exit();
        }
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}



// VALIDATION AVIS
public function validationavis($idAvis) {
    if (Securite::verifAccessSession()) {
        if (isset($_POST['idAvis'])) {
            $idAvis = (int) $_POST['idAvis'];
            $valide = true; // Vous pouvez définir la valeur de $valide ici (true pour la validation).
            $this->espaceproManager->validateAvis($idAvis, $valide);

            $_SESSION['alert'] = [
                "message" => "L'avis a été validé avec succès",
                "type" => "alert-success"
            ];

            header('Location: ' . URL . 'back/espacepro/visualisationavis');
            exit();
        } else {
            throw new Exception("Données invalides pour la validation de l'avis");
        }
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}






// FIN CONTROLLER AVIS

// ----------------------------------------------------------------------------

// CONTROLLER PRESTATION

   // VISUALISATION PRESTATION
   public function visualisationprestation() {
    if (Securite::verifAccessSession()) {
        $prestations = $this->espaceproManager->getPrestation();
        require_once(__ROOT__ . '/views/commons/espacepro_prestation_view.php');
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// SUPPRESSION PRESTATION
public function suppressionprestation() {
    if (isset($_POST['idPrestation']) && is_numeric($_POST['idPrestation']) && !empty($_POST['idPrestation'])) {
        $idPrestation = (int) Securite::secureHTML($_POST['idPrestation']);
        $imagePrestation = $this->espaceproManager->getimageprestation($idPrestation);

        if (file_exists("public/images/" .  $imagePrestation)) {
            unlink("public/images/" .  $imagePrestation);
        }

        if ($this->espaceproManager->compterPrestation( $idPrestation) > 0) {
            $this->espaceproManager->deleteDBprestation( $idPrestation);

            $_SESSION['alert'] = [
                "message" => "La prestation est supprimé",
                "type" => "alert-success"
            ];
        } else {
            $_SESSION['alert'] = [
                "message" => "La prestation n'a pas été trouvé",
                "type" => "alert-danger"
            ];
        }

        header('Location: ' . URL . 'back/espacepro/visualisationprestation');
        exit();
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// MODIFICATION PRESTATION
public function modificationprestation() {
    if (Securite::verifAccessSession()) {
        $idPrestation = (int) Securite::secureHTML($_POST['idPrestation']);
        $imagePrestation = Securite::secureHTML($_POST['imagePrestation']);
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
        $updated_at = date("Y-m-d H:i:s");

        $this->espaceproManager->updateVehicule(
            $idVehicule, $imageVoiture, $famille, $marque, $modele, $annee,
            $kilometrage, $boitevitesse, $energie, $datecirculation,
            $puissance, $places, $couleur, $description, $prix, $imageCritere, $updated_at
        );

        $_SESSION['alert'] = [
            "message" => "Le véhicule a bien été modifié",
            "type" => "alert-success"
        ];

        header('Location: ' . URL . 'back/espacepro/visualisationvoituresoccasions');
        exit();
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// CREATION TEMPLATE CREATION PRESTATION
public function creationTemplateVehicule() {
    if (Securite::verifAccessSession()) {
        require_once "views/commons/espacepro_ajout_voitures_view.php";
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

// CREATION PRESTATION

public function creationvoituresoccasions() {
    if (Securite::verifAccessSession()) {
        try {
            $imageVoiture = "";
            if (isset($_FILES['imageVoiture']['size']) && $_FILES['imageVoiture']['size'] > 0) {
                $repertoire = "public/images/";
                $imageVoiture = ajoutImage($_FILES['imageVoiture'], $repertoire);
            }

            $imageCritere = "";
            if (isset($_FILES['imageCritere']['size']) && $_FILES['imageCritere']['size'] > 0) {
                $repertoire = "public/images/";
                $imageCritere = ajoutImage($_FILES['imageCritere'], $repertoire);
            }

            $famille = isset($_POST['famille']) ? $_POST['famille'] : '';
            $marque = isset($_POST['marque']) ? $_POST['marque'] : '';
            $modele = isset($_POST['modele']) ? $_POST['modele'] : '';
            $annee = isset($_POST['annee']) ? (int) $_POST['annee'] : 0;
            $kilometrage = isset($_POST['kilometrage']) ? (int) $_POST['kilometrage'] : 0;
            $boitevitesse = isset($_POST['boitevitesse']) ? $_POST['boitevitesse'] : '';
            $energie = isset($_POST['energie']) ? $_POST['energie'] : '';
            $datecirculation = isset($_POST['datecirculation']) ? $_POST['datecirculation'] : '';
            $puissance = isset($_POST['puissance']) ? (int) $_POST['puissance'] : 0;
            $places = isset($_POST['places']) ? (int) $_POST['places'] : 0;
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $prix = isset($_POST['prix']) ? (float) $_POST['prix'] : 0;
            $created_at = date('Y-m-d H:i:s'); // Date actuelle

            $idVehicule = $this->espaceproManager->createVehicule(
                $imageVoiture, $famille, $marque, $modele, $annee,
                $kilometrage, $boitevitesse, $energie, $datecirculation,
                $puissance, $places, $couleur, $description, $prix, $imageCritere, $created_at
            );

            $_SESSION['alert'] = [
                "message" => "Le véhicule a bien été créé sous l'identifiant : " . $idVehicule,
                "type" => "alert-success"
            ];

            header('Location: ' . URL . 'back/espacepro/creationtemplatevehicule');
            exit();
        } catch (Exception $e) {
            $_SESSION['alert'] = [
                "message" => "Erreur lors de la création du véhicule : " . $e->getMessage(),
                "type" => "alert-danger"
            ];
            header('Location: ' . URL . 'back/espacepro/creationtemplatevehicule');
            exit();
        }
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}


        
// FIN CONTROLLER PRESTATION

//----------------------------------------------------------------------------

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
    

    
}

ob_end_flush();
















