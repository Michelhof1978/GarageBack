 {# //pour mettre en mémoire tampon la sortie générée par le script. Cela permet de stocker temporairement les données de sortie dans un tampon plutôt que de les envoyer directement au navigateur.  #}
 <?php ob_start(); ?>

<?php
$content = ob_get_clean();
