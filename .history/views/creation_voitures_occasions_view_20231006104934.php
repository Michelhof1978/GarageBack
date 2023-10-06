<?php 
//le contenu généré n'est pas immédiatement affiché dans le navigateur, mais il est stocké en mémoire tampon pour être utilisé ultérieurement
//utile lorsque l'on doit effectuer des redirections HTTP ou lorsqu'on capturer la sortie pour la stocker dans une variable plutôt que de l'envoyer au navigateur
ob_start(); 
?>
<form>
  
  <div class="form-group">
    <label for="imageVoiture" class="form-label">Image Voiture</label>
    <input type="text" class="form-control" id="imageVoiture" name="imageVoiture">
  </div>

  <div class="form-group">
    <label for="famille" class="form-label">Famille</label>
    <input type="text" class="form-control" id="famille" name="famille">
  </div>

  <div class="form-group">
    <label for="marque" class="form-label">Marque</label>
    <input type="text" class="form-control" id="marque" name="marque">
  </div>

  <div class="form-group">
    <label for="modele" class="form-label">Modele</label>
    <input type="text" class="form-control" id="modele" name="modele">
  </div>

  <div class="form-group">
    <label for="annee" class="form-label">Annee</label>
    <input type="text" class="form-control" id="annee" name="annee">
  </div>

  <div class="form-group">
    <label for="kilometrage" class="form-label">Kilometrage</label>
    <input type="text" class="form-control" id="kilometrage" name="kilometrage">
  </div>

  <div class="form-group">
    <label for="boitevitesse" class="form-label">Boite de vitesse</label>
    <input type="text" class="form-control" id="boitevitesse" name="boitevitesse">
  </div>

  <div class="form-group">
    <label for="energie" class="form-label">Energie</label>
    <input type="text" class="form-control" id="energie" name="energie">
  </div>

  <div class="form-group">
    <label for="datecirculation" class="form-label">Date 1ère circulation</label>
    <input type="text" class="form-control" id="datecirculation" name="datecirculation">
  </div>

  <div class="form-group">
    <label for="puissance" class="form-label">puissance</label>
    <input type="text" class="form-control" id="puissance" name="puissance">
  </div>

  <div class="form-group">
    <label for="places" class="form-label">Places</label>
    <input type="text" class="form-control" id="places" name="places">
  </div>

  <div class="form-group">
    <label for="couleur" class="form-label">Couleur</label>
    <input type="text" class="form-control" id="couleur" name="couleur">
  </div>

  <div class="mb-3">
  <label for="description" class="form-label">Déscription</label>
  <textarea class="form-control" id="description" rows="3"></textarea>
</div>
  

  <div class="form-group">
    <label for="prix" class="form-label">Prix</label>
    <input type="text" class="form-control" id="prix" name="libelle">
  </div>

  <div class="form-group">
    <label for="libelle" class="form-label">Libelle</label>
    <input type="text" class="form-control" id="libelle" name="libelle">
  </div>

  

  
  <button type="submit" class="btn btn-primary">Valider</button>
</form>



<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();// Fin de la mémoire tampon et stockage du contenu dans une variable
$titre = "Page De Création Vehicules";
require "views/commons/template.php";
?>
