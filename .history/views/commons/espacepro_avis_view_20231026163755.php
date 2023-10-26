
<?php ob_start(); ?>

<div class="container">
    <h1>Liste des avis clients</h1>
    <?php if (isset($_SESSION['alert'])): ?>
        <div class="alert alert-success"><?= $_SESSION['alert']['message'] ?></div>
        <?php unset($_SESSION['alert']); ?>
    <?php endif; ?>

    <?php $modeModification = false; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Avis</th>
                <th>Nom Clients</th>
                <th>Prénom Clients</th>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Date de création</th>
                <th>Date de mise à jour</th>
                <th>Statut</th>
                <th>Actions</th>
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
                    <td><?= isset($avi['created_at']) ? $avi['created_a'] : '' ?></td>
                    <td><?= isset($avi['updated_at']) ? $avi['updated_at'] : '' ?></td>
                    <td><?= $avi['valide'] ? 'Validé' : 'Non Validé' ?></td>
                    <td>
                        <?php if ($modeModification === $avi['idAvis']): ?>
                            <form method="POST" action="<?= URL ?>back/espacepro/modificationavis">
                                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                                <td><?= $avi['idAvis'] ?></td>
                                <td><input type="text" name="nom" class="form-control" value="<?= $avi['nom'] ?>" /></td>
                                <td><input type text" name="prenom" class="form-control" value="<?= $avi['prenom'] ?>" /></td>
                                <td><input type="number" name="note" class="form-control" value="<?= $avi['note'] ?>" /></td>
                                <td><textarea name='commentaire' class="form-control" rows="4"><?= $avi['commentaire'] ?></textarea></td>
                                <td colspan="2">
                                    <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>" />
                                    <button class="btn btn-primary" type="submit" name="valider">Valider</button>
                                </td>
                            </form>
                        <?php else: ?>
                            <form method="POST" action="<?= URL ?>back/espacepro/visualisationavis">
                                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                                <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                            </form>
                        <?php endif; ?>

                        <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/suppressionavis" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        </form>
                        <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/validationavis">
                            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                            <button type="submit" class="btn btn-success" name="valider">Valider</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "Liste Des Avis Clients";
require "views/commons/template.php";
