<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de véhicules</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Liste des véhicules</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Référence</th>
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
    </div>

    <!-- Inclure Bootstrap JavaScript et jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require_once(__ROOT__ . '\views\commons\template.php');
?>
