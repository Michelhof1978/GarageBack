<?php ob_start(); ?>

/*permettra lors du test sur cli sur bouton submit si la connexion s effectue bien. #}
 <form method="POST" action="<?= URL ?>back/connexion"> //Aller sur l url en ajoutant à la fin back/connexion pour rentrer ds la page connexion 
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php 
$content = ob_get_clean();
$titre = "Login";
require "views/commons/template.php";