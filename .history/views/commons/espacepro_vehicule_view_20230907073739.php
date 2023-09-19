<?php ob_start(); ?>
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
            <th scope="col">1ère mise en Circulation</th>
            <th scope="col">Puissance</th>
            <th scope="col">Places</th>
            <th scope="col">Couleur</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicules as $vehicule): ?>
            <tr>
                <th scope="row"><?= $vehicule['idVehicule'] ?></th>
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
require_once(__ROOT__ . '\views\commons\template.php');
?>


<?php ob_start(); ?>
<table class="table">
    <tbody>
        <?php foreach ($vehicules as $vehicule): ?>
            <?php foreach ($vehicule as $key => $value): ?>
                <tr>
                <th scope="col">Réference</th>
            <th scope="col">Famille</th>
            <th scope="col">Marque</th>
            <th scope="col">Modèle</th>
            <th scope="col">Année</th>
            <th scope="col">Kilométrage</th>
            <th scope="col">Boite de Vitesse</th>
            <th scope="col">Energie</th>
            <th scope="col">1ère mise en Circulation</th>
            <th scope="col">Puissance</th>
            <th scope="col">Places</th>
            <th scope="col">Couleur</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col" colspan="2">Actions</th>
                    <th scope="row"><?= $key ?></th>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
            <tr><td colspan="2"></td></tr> <!-- Ajoute une ligne vide entre chaque véhicule -->
        <?php endforeach; ?>
    </tbody>
</table>

<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require_once(__ROOT__ . '\views\commons\template.php');
?>
