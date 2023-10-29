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
        <option value="pneus">Citroen</option>
        <option value="freinage">Peugeot</option>
        <option value="vidange">Kia</option>
        <option value="amortisseurs">Bmw</option>
        <option value="entretien">Bmw</option>
        <option value="embrayage">Bmw</option>
        <option value="pollution">pollution</option>
        <option value="carrosserie">carrosserie</option>
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
        <option value="2011">2000</option>
        <option value="2012">2001</option>
        <option value="2013">2002</option>
        <option value="2014">2003</option>
        <option value="2015">2004</option>
        <option value="2016">2005</option>
        <option value="2017">2006</option>
        <option value="2018">2007</option>
        <option value="2010">2008</option>
        <option value="2018">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
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
    <select class="form-control" id="boitevitesse" name="boitevitesse">
        <option value="manuel">Manuel</option>
        <option value="automatique">Automatique</option>
        
    </select>
</div>

<div class="form-group">
    <label for="energie" class="form-label">Energie</label>
    <select class="form-control" id="energie" name="energie">
        <option value="essence">Essence</option>
        <option value="diesel">Diesel</option>
        <option value="electrique">Electrique</option>
        <option value="gpl">Gpl</option>
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
        <option value="vert">Vert</option>
        <option value="rouge">Rouge</option>
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
