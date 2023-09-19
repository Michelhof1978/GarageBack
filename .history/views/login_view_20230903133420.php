 <!--pour mettre en mémoire tampon la sortie générée par le script. Cela permet de stocker temporairement les données de sortie dans un tampon plutôt que de les envoyer directement au navigateur.  -->
 <?php ob_start(); ?>

 <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
$content = ob_get_clean(); //est utilisé pour récupérer le contenu de la mémoire tampon (buffer) où les sorties générées par le script ont été stockées en utilisant la fonction ob_start().
$titre = "Login";
require "views/common/template.php";//Données qui vont être inséréeé ds template