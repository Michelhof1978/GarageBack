<?php
// Activation de la mémoire tampon
ob_start();
?>

<div class="container">
    <h1>Liste des avis clients</h1>
    <?php if (isset($_SESSION['alert'])): ?>
        <div class="alert alert-success"><?= $_SESSION['alert']['message'] ?></div>
        <?php unset($_SESSION['alert']); ?>
    <?php endif; ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Avis</th>
                <th>Nom Clients</th>
                <th>Prénom Clients</th>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Date de création</th>
                <th>Date de mise à jour</th> <!-- Ajout de la colonne de mise à jour -->
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
                    <td><?= $avi['created_at'] ?></td>
                    <td><?= isset($avi['updated_at']) ? $avi['updated_at'] : '' ?></td>
                    <td><?= $avi['valide'] ? 'Validé' : 'Non Validé' ?></td>
                    <td>
                   
            <!-- Formulaire pour la modification -->
            <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/modificationavis">
                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
            </form>
            <!-- Formulaire pour la suppression -->
            <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/suppressionavis" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
            </form>
            <!-- Formulaire de validation -->
            <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/validationavis">
                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                <button type="submit" class="btn btn-success" name="valider">Valider</button>
            </form>
        </td>
    </tr>
    <?php if (isset($_POST['modifier']) && $_POST['idAvis'] == $avi['idAvis']): ?>
    <tr>
        <form method="POST" action="<?= URL ?>back/espacepro/modificationavis">
            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
            <td><?= $avi['idAvis'] ?></td>
            <td><input type="text" name="nom" class="form-control" value="<?= $avi['nom'] ?>" /></td>
            <td><input type="text" name="prenom" class="form-control" value="<?= $avi['prenom'] ?>" /></td>
            <td><input type="number" name="note" class="form-control" value="<?= $avi['note'] ?>" /></td>
            <td><textarea name='commentaire' class="form-control" rows="4"><?= $avi['commentaire'] ?></textarea></td>
            <td colspan="2">
                <button class="btn btn-primary" type="submit" name="valider">Valider</button>
            </td>
        </form>
    </tr>
    <?php endif; ?>
<?php endforeach; ?>

        </tbody>
    </table>
</div>


<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "Liste Des Avis Clients";
require "views/commons/template.php";
