 {# //pour mettre en mémoire tampon la sortie générée par le script. Cela permet de stocker temporairement les données de sortie dans un tampon plutôt que de les envoyer directement au navigateur.  #}
 <?php ob_start(); ?>

<?php
$content = ob_get_clean(); //est utilisé pour récupérer le contenu de la mémoire tampon (buffer) où les sorties générées par le script ont été stockées en utilisant la fonction ob_start().
$titre = "Login"