<?php ob_start();
// //Aide pour meilleur affichage des description des erreurs ds la console
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Réference</th>
      <th scope="col">Famille</th>
      <th scope="col">Marque</th>
      <th scope="col">Modèle</th>
      <th scope="col">Année</th>
      <th scope="col">Kilométrage</th>
      <th scope="col">Boite de Vitesse</th>
      <th scope="col">Energie</th>
      <th scope="col">1 ère mise en Circulation</th>
      <th scope="col">Puissance</th>
      <th scope="col">Places</th>
      <th scope="col">Couleur</th>
      <th scope="col">Description</th>
      <th scope="col">Prix</th>
      

      <th scope="col" colspan="2">actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vehicules as $vehicule): ?>
    <tr>
      <th scope="row">1</th>
      <td><?= $vehicule['id_vehicule']?></td>
      
      <td><?= $vehicule['famille']?></td>
      <td><?= $vehicule['marque']?></td>
      <td><?= $vehicule['modele']?></td>
      <td><?= $vehicule['annee']?></td>
      <td><?= $vehicule['kilometrage']?></td>
      <td><?= $vehicule['boitevitesse']?></td>
      <td><?= $vehicule['energie']?></td>
      <td><?= $vehicule['datecirculation']?></td>
      <td><?= $vehicule['puissance']?></td>
      <td><?= $vehicule['places']?></td>
      <td><?= $vehicule['couleur']?></td>
      <td><?= $vehicule['description']?></td>
      <td><?= $vehicule['prix']?></td>

      <td><button class="btn btn-warning">Modifier</button></td>
      <td><button class="btn btn-danger">Supprimer</button></td>


    </tr>
<?php endforeach; ?>
  </tbody>
</table>

<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require_once(__ROOT__.'\views\commons/template.php');
