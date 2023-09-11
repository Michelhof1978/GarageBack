<?php ob_start(); ?>

<?php
// //Aide pour meilleur affichage des description des erreurs ds la console
// error_reporting(E_ALL);
// ini_set('display_errors', '1');


$content = ob_get_clean();// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$titre = "CONTENU";
require "views/commons/template.php";