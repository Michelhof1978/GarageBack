<?php ob_start(); ?>
<table class="vehiculeTable">
    <thead>
        <tr>
            <th scope="col">Référence</th>
            <th scope="col">Famille</th>
            <!-- Ajoutez ici les autres en-têtes des colonnes -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicules as $vehicule): ?>
            <tr>
                <td><?= $vehicule['reference'] ?></td>
                <td><?= $vehicule['famille'] ?></td>
                <!-- Ajoutez ici les autres cellules de données -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require_once(__ROOT__ . '/views/commons/template.php');
?>
