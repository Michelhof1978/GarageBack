<!DOCTYPE html>
<html>
<head>
    <title>Liste des avis clients</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Liste des avis clients</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Avis</th>
                    <th>Nom Clients</th>
                    <th>Prénom Clients</th>
                    <th>Note</th>
                    <th>Commentaire</th>
                    <th>Date de création</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avis as $avi): ?>
                    <tr>
                    <th scope="row"><?= $avi['idAvis'] ?></th>
                        <td><?= $avi['nom'] ?></td>
                        <td><?= $avi['prenom'] ?></td>
                        <td><?= $avi['note'] ?></td>
                        <td><?= $avi['commentaire'] ?></td>
                        <td><?= $avi['created_at'] ?></td>

                        <td>
                        <!-- Formulaire pour la modification -->
                        <form method="POST" action="<?= URL ?>back/espacepro/visualisationavis">
                            <input type="hidden" name="idAvis" value="<?= $vehicule['idAvis'] ?>">
                            <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <!-- Formulaire pour la suppression -->
                        <form method="POST" action="<?= URL ?>back/espacepro/suppressionvoituresoccasions" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="idAvis" value="<?= $vehicule['idAvis'] ?>">
                            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        </form>
                    </td>
                    </tr>

                    idAvis

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
   
</body>
</html>

<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "Avis Clients";
require "views/commons/template.php";
?>
