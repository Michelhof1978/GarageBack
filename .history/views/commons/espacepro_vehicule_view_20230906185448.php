<?php ob_start(); ?>
<!-- Code HTML pour afficher les données des véhicules -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Famille</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Année</th>
            <!-- ... autres colonnes ... -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicules as $vehicule): ?>
            <tr>
                <td><?= $vehicule['idVehicule'] ?></td>
                <td><?= $vehicule['famille'] ?></td>
                <td><?= $vehicule['marque'] ?></td>
                <td><?= $vehicule['modele'] ?></td>
                <td><?= $vehicule['annee'] ?></td>
                <!-- ... autres colonnes ... -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
$titre = "Liste des véhicules";
require_once(__ROOT__ . '\views\commons\template.php');
?>
