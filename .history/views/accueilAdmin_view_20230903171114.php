<?php ob_start(); ?>


<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "Page d'ami";
require "views/commons/template.php";
?>
