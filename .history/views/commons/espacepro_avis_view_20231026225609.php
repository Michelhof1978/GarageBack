<?php ob_start(); ?>

<div class="container-fluid no-margin">
    <h2 class="text-center">Gestion des avis clients</h2>
    
    <table class="table table-striped table-responsive w-100 mx-0">
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
                    <td><?= isset($avi['created_at']) ? $avi['created_at'] : '' ?></td>
                    <td><?= isset($avi['updated_at']) ? $avi['updated_at'] : '' ?></td>
                    <td><?= $avi['valide'] ? 'Validé' : 'Non Validé' ?></td>
                    
                    <td>
                        <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/modificationavis">
                            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                            <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                        </form>
                        
                        <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/visualisationavis">
                            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                            <button type="button" class="btn btn-primary valider" data-id="<?= $avi['idAvis'] ?>">Valider</button>
                        </form>
                        
                        <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/suppressionavis" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php if (isset($_POST['modifier']) && $_POST['idAvis'] == $avi['idAvis']): ?>
                    <tr class="modification-inputs" style="display: none;">
                        <form method="POST" action="<?= URL ?>back/espacepro/visualisationavis">
                            <td><?= $avi['idAvis'] ?></td>
                            <td><input type="text" name="nom" class="form-control" value="<?= $avi['nom'] ?>" /></td>
                            <td><input type="text" name="prenom" class="form-control" value="<?= $avi['prenom'] ?>" /></td>
                            <td><input type="number" name="note" class="form-control" value="<?= $avi['note'] ?>" /></td>
                            <td><textarea name='commentaire' class="form-control" rows="4"><?= $avi['commentaire'] ?></textarea></td>
                            <td><input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>" /></td>
                            <td><button class="btn btn-primary" type="submit" name="valider">Valider</button></td>
                        </form>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
$titre = "Liste Des Avis Clients";
require "views/commons/template.php";
?>
