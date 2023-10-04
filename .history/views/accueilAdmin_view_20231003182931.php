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
    <div class="row text-center">
    <img class=" col-12 p-0"  src="../assets/logo2.png" alt="logo entreprise parrot">

    </div>
   
    

    <?php
    // Fin de la mémoire tampon et stockage du contenu dans une variable
    $content = ob_get_clean();
    require "views/commons/template.php";
    ?>
</body>
</html>
