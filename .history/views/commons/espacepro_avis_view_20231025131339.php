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
                        <td><?= $avi['valide'] ? 'Validé' : 'Non Validé' ?></td>
                        <td>
                            <!-- Formulaire pour la modification -->
                            <form method="POST" action="<?= URL ?>back/espacepro/modificationavis">
                                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                                <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                            </form>
                            <!-- Formulaire pour la suppression -->
                            <form method="POST" action="<?= URL ?>back/espacepro/suppressionavis" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                                <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                            </form>
                            <!-- Formulaire de validation -->
                            <form method="POST" action="<?= URL ?>back/espacepro/validationavis">
                                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                                <button type="submit" class="btn btn-success" name="valider">Valider</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "Liste Des Avis Clients";
require "views/commons/template.php";
