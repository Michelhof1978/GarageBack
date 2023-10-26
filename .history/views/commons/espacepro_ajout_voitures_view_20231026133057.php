<?php 
//le contenu généré n'est pas immédiatement affiché dans le navigateur, mais il est stocké en mémoire tampon pour être utilisé ultérieurement
//utile lorsque l'on doit effectuer des redirections HTTP ou lorsqu'on capturer la sortie pour la stocker dans une variable plutôt que de l'envoyer au navigateur
ob_start(); 
?>
<!-- //TEMPLATE POUR POUVOIR CREER UNE VOITURE -->
<form method="POST" action="<?= URL ?>back/espacepro/creationvoituresoccasions" enctype="multipart/form-data">
  <div class="form-group">
    <label for="imageVoiture" class="form-label">Photo Voiture</label>
    <input type="file" class="form-control" id="imageVoiture" name="imageVoiture">
  </div>

  <div class="form-group">
    <label class="form-label">Famille</label>
    <div class="form-check">
        <input type="radio" id="utilitaire" name="famille" value="Utilitaire" class="form-check-input">
        <label for="utilitaire" class="form-check-label">Utilitaire</label>
    </div>
    <div class="form-check">
        <input type="radio" id="berline" name="famille" value="Berline" class="form-check-input">
        <label for="berline" class="form-check-label">Berline</label>
    </div>
    <div class="form-check">
        <input type="radio" id="familiale" name="famille" value="Familiale" class="form-check-input">
        <label for="familiale" class="form-check-label">Familiale</label>
    </div>

  <div class="form-group">
    <label for="marque" class="form-label">Marque</label>
    <select class="form-control" id="marque" name="marque">
        <option value="citroen">Citroen</option>
        <option value="peugeot">Peugeot</option>
        <!-- Ajoutez les autres options de marque ici -->
    </select>
  </div>

  <div class="form-group">
    <label for="modele" class="form-label">Modèle</label>
    <input type="text" class="form-control" id="modele" name="modele">
  </div>

  <div class="form-group">
    <label for="annee" class="form-label">Année</label>
    <select class="form-control" id="annee" name="annee">
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <!-- Ajoutez les autres options d'année ici -->
    </select>
  </div>

  <div class="form-group">
    <label for="kilometrage" class="form-label">Kilométrage</label>
    <input type="number" class="form-control" id="kilometrage" name="kilometrage">
  </div>

  <div class="form-group">
    <label for="boitevitesse" class="form-label">Boite de vitesse</label>
    <select class="form-control" id="boitevitesse" name="boitevitesse">
        <option value="manuel">Manuel</option>
        <option value="automatique">Automatique</option>
    </select>
  </div>

  <div class="form-group">
    <label for="energie" class="form-label">Énergie</label>
    <select class="form-control" id="energie" name="energie">
        <option value="essence">Essence</option>
        <option value="diesel">Diesel</option>
        <!-- Ajoutez les autres options d'énergie ici -->
    </select>
  </div>

  <div class="form-group">
    <label for="datecirculation" class="form-label">Date 1ère circulation</label>
    <input type="date" class="form-control" id="datecirculation" name="datecirculation" format="dd-mm-yyyy">
  </div>

  <div class="form-group">
    <label for="puissance" class="form-label">Puissance</label>
    <input type="number" class="form-control" id="puissance" name="puissance">
  </div>

  <div class="form-group">
    <label for="places" class="form-label">Places</label>
    <input type="number" class="form-control" id="places" name="places">
  </div>

  <div class="form-group">
    <label for="couleur" class="form-label">Couleur</label>
    <select class="form-control" id="couleur" name="couleur">
        <option value="blanc">Blanc</option>
        <option value="bleu">Bleu</option>
        <!-- Ajoutez les autres options de couleur ici -->
    </select>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="prix" class="form-label">Prix</label>
    <input type="number" class="form-control" id="prix" name="prix">
  </div>

  <div class="form-group">
    <label for="imageCritere" class="form-label">Image Critère</label>
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
$titre = "Ajouter un Vehicule";
require "views/commons/template.php";
?>
