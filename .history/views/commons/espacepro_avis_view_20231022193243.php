<?php ob_start(); ?>

<div class="container-fluid no-margin">
    <h1 class="text-center">Liste des avis clients</h1>
    <table class="table table-striped table-responsive w-100 mx-0">
        <thead>
            <tr>
                <th scope="col">ID Avis</th>
                <th scope="col">Nom Clients</th>
                <th scope="col">Prénom Clients</th>
                <th scope="col">Note</th>
                <th scope="col">Contenu</th>
                <th scope="col">Date de création</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($avis as $avi): ?>
                <tr>
                    <th scope="row"><?= $avi['idAvis'] ?></th>
                    <td><?= $avi['nom'] ?></td>
                    <td><?= $avi['prenom'] ?></td>
                    <td><?= $avi['note'] ?></td>
                    <td><?= $avi['contenu'] ?></td>
                    <td><?= $avi['created_at'] ?></td>
                    <td>
                        <form method="POST" action="<?= URL ?>back/espacepro/modifieravis">
                            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                            <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                        </form>
                        <form method="POST" action="<?= URL ?>back/espacepro/supprimeravis" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
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
$titre = "Gestion des Avis Clients";
require "views/commons/template.php";
?>
