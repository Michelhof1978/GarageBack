<?php 
//le contenu généré n'est pas immédiatement affiché dans le navigateur, mais il est stocké en mémoire tampon pour être utilisé ultérieurement
//utile lorsque l'on doit effectuer des redirections HTTP ou lorsqu'on capturer la sortie pour la stocker dans une variable plutôt que de l'envoyer au navigateur
ob_start(); 
?>
<form method="POST" action="<?= URL ?>back/espacepro/creationvoituresoccasions" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="imageVoiture" class="form-label">Image Voiture</label>
    <input type="file" class="form-control" id="imageVoiture" name="imageVoiture">
  </div>

  <div class="form-group">
    <label for="famille" class="form-label">Famille</label>
    <select class="form-control" id="famille" name="famille">
        <option value="Utilitaire">Utilitaire</option>
        <option value="Berline">Berline</option>
        <option value="Familiale">Familiale</option>
        <option value="Citadine">Citadine</option>
        <option value="Suv">Suv</option>
    </select>
</div>


<div class="form-group">
    <label for="marque" class="form-label">marque</label>
    <select class="form-control" id="marque" name="marque">
        <option value="citroen">citroen</option>
        <option value="peugeot">peugeot</option>
        <option value="kia">kia</option>
        <option value="Bmw">Bmw</option>
    </select>
</div>



  <div class="form-group">
    <label for="modele" class="form-label">Modele</label>
    <input type="text" class="form-control" id="modele" name="modele">
  </div>

  <div class="form-group">
    <label for="annee" class="form-label">Année</label>
    <select class="form-control" id="annee" name="annee">
        <option value="option1">2010</option>
        <option value="option2">2011</option>
        <option value="option3">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
    </select>
</div>

  

  <div class="form-group">
    <label for="kilometrage" class="form-label">Kilomètrage</label>
    <input type="number" class="form-control" id="kilometrage" name="kilometrage">
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
    <input type="date" class="form-control" id="datecirculation" name="datecirculation">
  </div>

  <div class="form-group">
    <label for="puissance" class="form-label">puissance</label>
    <input type="number" class="form-control" id="puissance" name="puissance">
  </div>

  <div class="form-group">
    <label for="places" class="form-label">Places</label>
    <input type="number" class="form-control" id="places" name="places">
  </div>

  <div class="form-group">
    <label for="couleur" class="form-label">Couleur</label>
    <input type="text" class="form-control" id="couleur" name="couleur">
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
    <label for="imageCritere" class="form-label">Image Critere</label>
    <input type="file" class="form-control" id="imageCritere" name="imageCritere">
  </div>

  

  
  <button type="submit" class="btn btn-primary">Valider</button>
</form>



<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();// Fin de la mémoire tampon et stockage du contenu dans une variable
$titre = "Ajouter un Vehicule";
require "views/commons/template.php";
?>
