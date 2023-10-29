<?php 
//le contenu généré n'est pas immédiatement affiché dans le navigateur, mais il est stocké en mémoire tampon pour être utilisé ultérieurement
//utile lorsque l'on doit effectuer des redirections HTTP ou lorsqu'on capturer la sortie pour la stocker dans une variable plutôt que de l'envoyer au navigateur
ob_start(); 
?>
<!-- //TEMPLATE POUR POUVOIR CREER UNE PRESTATION -->
<form method="POST" action="<?= URL ?>back/espacepro/creationprestation" enctype="multipart/form-data">  
  <div class="form-group">
    <label for="imagePrestation" class="form-label">Image Prestation</label>
    <input type="file" class="form-control" id="imagePrestation" name="imagePrestation">
  </div>


<div class="form-group">
    <label for="nom" class="form-label">Nom prestation</label>
    <select class="form-control" id="nom" name="nom">
        <option value="pneus">Pneus</option>
        <option value="freinage">Freinage</option>
        <option value="vidange">Vidange</option>
        <option value="amortisseurs">Amortisseurs</option>
        <option value="entretien">Entretien</option>
        <option value="embrayage">Embrayage</option>
        <option value="pollution">Pollution</option>
        <option value="carrosserie">Carrosserie</option>
    </select>
</div>



  
  
  <div class="mb-3">
  <label for="description" class="form-label">Déscription</label>
  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
</div>
  

  <div class="form-group">
    <label for="prix" class="form-label">Prix</label>
    <input type="number" class="form-control" id="prix" name="prix">
  </div>

  <div class="form-group">
    <label for="imageCritere" class="form-label">Image Critere</label>
    <input type="file" class="form-control" id="imageCritere" name="imageCritere">
  </div>

  <div class="form-group">
    <label for="created_at" class="form-label">Annonce créée le :</label>
    <input type="date" class="form-control" id="created_at" name="created_at" value="<?php echo date('Y-m-d'); ?>">
  </div>


  
  <button type="submit" class="btn btn-primary">Valider</button>
</form>



<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();// Fin de la mémoire tampon et stockage du contenu dans une variable
$titre = "Ajouter une prestation";
require "views/commons/template.php";
?>
