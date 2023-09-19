<?php
ob_start();
$titre = "VOITURES D'OCCASIONS";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Garrage Parrot - Espace Pro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php if (!Securite::verifAccessSession()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>back/login">Connexion</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>back/admin">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gestionnaire Du Site
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= URL ?>back/espacepro/messagerie">Messagerie</a>
                            <a class="dropdown-item" href="<?= URL ?>back/espacepro/avis">Avis</a>
                            <a class="dropdown-item" href="<?= URL ?>back/espacepro/contenu">Contenu</a>
                            <a class="dropdown-item" href="<?= URL ?>back/espacepro/horaire">Horaire</a>
                            <a class="dropdown-item" href="<?= URL ?>back/espacepro/voituresoccasions">Voitures d'Occasions</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>back/deconnexion">Déconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <table class="vehiculeTable">
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
</body>
</html>

<?php
$content = ob_get_clean();
echo $content;
?>
