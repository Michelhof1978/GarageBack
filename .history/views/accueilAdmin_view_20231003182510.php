<?php 
//le contenu généré n'est pas immédiatement affiché dans le navigateur, mais il est stocké en mémoire tampon pour être utilisé ultérieurement
//utile lorsque l'on doit effectuer des redirections HTTP ou lorsqu'on capturer la sortie pour la stocker dans une variable plutôt que de l'envoyer au navigateur
ob_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre; ?></title>
</head>
<body>
    <!-- Insérez votre image ici -->
    <img class=" col-12 m-1"  src="../assets/logo2.png" alt="logo entreprise parrot">
    

<?php
// Aide pour meilleur affichage des description des erreurs ds la console
 error_reporting(E_ALL);
 ini_set('display_errors', '1');


// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();// Fin de la mémoire tampon et stockage du contenu dans une variable
$titre = "Bienvenue à La Page D'Administration";
require "views/commons/template.php";

