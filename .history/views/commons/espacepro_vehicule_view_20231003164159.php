<?php ob_start(); ?>

<div class="container-fluid no-margin">
    <h1 class="text-center">Liste des véhicules</h1>
    <table class="table table-striped mx-0"> 
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
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicules as $vehicule): ?>
                <tr>
                    <th scope="row"><?= $vehicule['idVehicule'] ?></th>
                    <td><?= $vehicule['imageVoiture'] ?></td>
                    <td><?= $vehicule['famille'] ?></td>
                    <td><?= $vehicule['marque'] ?></td>
                    <td><?= $vehicule['modele'] ?></td>
                    <td><?= $vehicule['annee'] ?></td>
                    <td><?= $vehicule['kilometrage'] ?></td>
                    <td><?= $vehicule['boitevitesse'] ?></td>
                    <td><?= $vehicule['energie'] ?></td>
                    <td><?= $vehicule['datecirculation'] ?></td>
                    <td><?= $vehicule['puissance'] ?></td>
                    <td><?= $vehicule['places'] ?></td>
                    <td><?= $vehicule['couleur'] ?></td>
                    <td><?= $vehicule['description'] ?></td>
                    <td><?= $vehicule['prix'] ?></td>
                    <td><?= $vehicule['imageCritere'] ?></td>

                    <td>
                        <!-- Formulaire pour la modification -->
                        <form method="POST" action="<?= URL ?>back/espacepro/validationModification">
                            <input type="hidden" name="idVehicule" value="<?= $vehicule['idVehicule'] ?>">
                            <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                        </form>
                    </td>

                    <td>
                        <!-- Formulaire pour la suppression -->
                        <form method="POST" action="<?= URL ?>back/espacepro/validationSuppression" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="idVehicule" value="<?= $vehicule['idVehicule'] ?>">
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
