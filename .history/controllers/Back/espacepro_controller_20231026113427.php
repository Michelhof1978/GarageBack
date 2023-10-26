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

    //VISUALISATION VEHICULE
    public function visualisationvoituresoccasions()//Visualisation des voitures en stock
    {
        if (Securite::verifAccessSession()) {
            $vehicules = $this->espaceproManager->getVoituresoccasions(); // Utilisez $vehicules au lieu de $voituresoccasions
            require_once(__ROOT__ . '/views/commons/espacepro_vehicule_view.php');          } else {
             throw new Exception("Vous n'avez pas accès à cette page");
          }
    }


//SUPPRESSION VEHICULE
public function suppressionvoituresoccasions()
{
    if (isset($_POST['idVehicule']) && is_numeric($_POST['idVehicule']) && !empty($_POST['idVehicule'])) {
        // Récupérer l'ID du véhicule en utilisant secureHTML
        $idVehicule = (int) Securite::secureHTML($_POST['idVehicule']);

        // Obtenir le nom des images à supprimer
        $imageVoiture = $this->espaceproManager->getimageVoiture($idVehicule);
        $imageCritere = $this->espaceproManager->getimageCritere($idVehicule);

        // Supprimer l'image du répertoire
        if (file_exists("public/images/" . $imageVoiture)) {
            unlink("public/images/" . $imageVoiture);
        }

        if (file_exists("public/images/" . $imageCritere)) {
            unlink("public/images/" . $imageCritere);
        }

        // Vérifier si le véhicule existe dans la base de données
        if ($this->espaceproManager->compterVehicule($idVehicule) > 0) {
            // Le véhicule existe, donc nous pouvons le supprimer
            $this->espaceproManager->deleteDBvehicule($idVehicule);

            // Message d'alerte session en relation avec template.php
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
        header('Location: ' . URL . 'back/espacepro/visualisationvoituresoccasions');
        exit();
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}


 //MODIFICATION   VEHICULE
 public function modificationvoituresoccasions($idVehicule) {
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
        $created_at = Securite::secureHTML($_POST['created_at']);
       $this->espaceproManager->updateVehicule(
            $idVehicule, $imageVoiture, $famille, $marque, $modele, $annee,
            $kilometrage, $boitevitesse, $energie, $datecirculation,
            $puissance, $places, $couleur, $description, $prix, $imageCritere, $created_at,
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



//CREATION VEHICULE
 public function creationTemplateVehicule(){
    if (Securite::verifAccessSession()) {
        require_once "views/espacepro_ajout_voitures_view.php";
      } else {
         throw new Exception("Vous n'avez pas accès à cette page");
      }
 }


 public function creationvoituresoccasions()
{
    if (Securite::verifAccessSession()) {
        try {
            $imageVoiture = "";
            if ($_FILES['imageVoiture']['size'] > 0) {
                $repertoire = "public/images/";//Permettra de supprimer l image du répertoire lors de la suppression
                $imageVoiture = ajoutImage($_FILES['imageVoiture'], $repertoire);
            }

            $imageCritere = "";
            if ($_FILES['imageCritere']['size'] > 0) {
                $repertoire = "public/images/";
                $imageCritere = ajoutImage($_FILES['imageCritere'], $repertoire);
            }

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
            $created_at = ($_POST['created_at']);

            $idVehicule = $this->espaceproManager->createVehicule(
                $imageVoiture, $famille, $marque, $modele, $annee,
                $kilometrage, $boitevitesse, $energie, $datecirculation,
                $puissance, $places, $couleur, $description, $prix, $imageCritere, $created_at,
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
public function modificationavis()
{
    if (Securite::verifAccessSession()) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                isset($_POST['idAvis']) &&
                isset($_POST['nom']) &&
                isset($_POST['prenom']) &&
                isset($_POST['note']) &&
                isset($_POST['commentaire'])
            ) {
                $idAvis = (int) $_POST['idAvis']; // Utilisez l'ID passé via le formulaire
                $nom = Securite::secureHTML($_POST['nom']);
                $prenom = Securite::secureHTML($_POST['prenom']);
                $note = (float) $_POST['note']; // Utilisez float pour traiter les décimales
                $commentaire = Securite::secureHTML($_POST['commentaire']);

                $this->espaceproManager->updateAvis(
                    $idAvis, $nom, $prenom, $note, $commentaire
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

// CREATION AVIS
public function creationTemplateAvis()
{
    if (Securite::verifAccessSession()) {
        require_once "views/commons/espacepro_ajout_avis_view.php";
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}

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
                $nom = ($_POST['nom']);
                $prenom = ($_POST['prenom']);
                $note = (int) ($_POST['note']);
                $commentaire = ($_POST['commentaire']);
                $created_at = ($_POST['created_at']);

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
                header('Location: ' . URL . 'back/espacepro/creationtemplateavis');
                exit();
            } else {
                throw new Exception("Données de création d'avis manquantes");
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
public function validationavis($idAvis)
{
    if (Securite::verifAccessSession()) {
        // Effectuez la validation de l'avis avec l'ID $idAvis en le marquant comme valide (true)
        $this->espaceproManager->validationAvis($idAvis, true);

        // Affichez un message de succès
        $_SESSION['alert'] = [
            "message" => "L'avis a été validé avec succès",
            "type" => "alert-success"
        ];

        // Redirigez vers la page de visualisation des avis
        header('Location: ' . URL . 'back/espacepro/visualisationavis');
        exit();
    } else {
        throw new Exception("Vous n'avez pas accès à cette page");
    }
}











// FIN CONTROLLER AVIS

// ----------------------------------------------------------------------------

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

















