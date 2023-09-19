<?php ob_start(); ?>


// //Aide pour meilleur affichage des description des erreurs ds la console
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col" colspan="">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require "views/commons/template.php";