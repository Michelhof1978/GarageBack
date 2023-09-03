<?php ob_start(); ?>

<?php
/* Ce commentaire ne sera pas affiché dans le HTML final.
Permet de mettre en mémoire tampon la sortie générée. */
?>
<!--<form method="POST" action="<?=// URL ?>back/connexion">
    <!-- Permet d'aller sur l'URL en ajoutant "back/connexion" à la fin pour accéder à la page de connexion -->
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form> -->

<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "Login";
require "views/commons/template.php";
?>
