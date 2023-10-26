// Instanciez AvisController en passant le gestionnaire.
$avisController = new AvisController($adminManager);

// ... Autres parties de votre code ...

// Exemple : Vous voulez afficher les avis lorsque l'URL est "back/espacepro/avis".
if ($url[0] === "back" && $url[1] === "espacepro" && $url[2] === "avis") {
    $avisController->getAvis();
}
