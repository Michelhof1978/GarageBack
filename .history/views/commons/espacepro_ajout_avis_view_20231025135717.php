<?php 
//le contenu généré n'est pas immédiatement affiché dans le navigateur, mais il est stocké en mémoire tampon pour être utilisé ultérieurement
//utile lorsque l'on doit effectuer des redirections HTTP ou lorsqu'on capturer la sortie pour la stocker dans une variable plutôt que de l'envoyer au navigateur
ob_start(); 
?>
<!-- //TEMPLATE POUR POUVOIR AJOUTER UN AVIS -->
<form method="POST" action="<?= URL ?>back/espacepro/creationavis" enctype="multipart/form-data">
  

  <div class="form-group">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom">
  </div>

  <div class="form-group">
    <label for="prenom" class="form-label">Prènom</label>
    <input type="text" class="form-control" id="prenom" name="prenom">
  </div>
  

  <div class="form-group">
    <label for="note" class="form-label">Note</label>
    <input type="number" class="form-control" id="note" name="note">
  </div>

  <div class="mb-3">
  <label for="commentaire" class="form-label">Description</label>
  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
</div>

  <div class="form-group">
    <label for="created_at" class="form-label">Avis crée le :</label>
    <input type="date" class="form-control" id="created_at" name="created_at" format="dd-mm-yyyy">
  </div>

  
  <button type="submit" class="btn btn-primary">Valider</button>
</form>



<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();// Fin de la mémoire tampon et stockage du contenu dans une variable
$titre = "Ajouter un Avis Client";
require "views/commons/template.php";
?>
