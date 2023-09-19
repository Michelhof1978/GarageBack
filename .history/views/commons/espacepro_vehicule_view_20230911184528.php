<?php ob_start(); ?>
 <!--pour commencer la temporisation de la sortie.
  Cela signifie que le contenu généré après cette instruction sera mis en mémoire tampon-->

  <?php ob_start(); ?>
<!-- Code HTML pour la page de modification -->
<div class="container-fluid no-margin">
    <h1 class="text-center">Modifier un véhicule</h1>
    <table class="table table-striped mx-0"> <!-- Ajout de la classe mx-0 ici -->
        <thead>
            <tr>
                <th scope="col">Référence</th>
                <th scope="col">Photo</th>
                <th scope="col">Famille</th>
                <th scope="col">Marque</th>
                <th scope="col">Modèle</th>
                <th scope="col">Année</th>
                <th scope="col">Kilométrage</th>
                <th scope="col">Boite de Vitesse</th>
                <th scope="col">Énergie</th>
                <th scope="col">1ère mise en Circulation</th>
                <th scope="col">Puissance</th>
                <th scope="col">Places</th>
                <th scope="col">Couleur</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Critère</th>
                <th scope="col" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($vehicules as $vehicule): ?>
                <tr>
                    <!-- Affichage des informations du véhicule -->
                    <td><?= $vehicule['idVehicule'] ?></td>
                    <!-- ... Affichage des autres informations ... -->

                    <td>
                        <!-- Formulaire de modification -->
                        <form method="POST" action="<?= URL ?>back/espacepro/modification">
                            <input type="hidden" name="vehicule_id" value="<?= $vehicule['idVehicule'] ?>">
                            <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                            </td>

<td>
    <!-- Formulaire de suppression -->
    <form method="POST" action="<?= URL ?>back/espacepro/validationSuppression" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
        <input type="hidden" name="vehicule_id" value="<?= $vehicule['idVehicule'] ?>">
        <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
    </form>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<?php
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require_once(__ROOT__ . '\views\commons\template.php');
?>









