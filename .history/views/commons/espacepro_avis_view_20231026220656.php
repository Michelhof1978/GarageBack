

<?php ob_start(); ?>

<div class="container-fluid no-margin">
    <h2 class="text-center">Gestion des avis clients</h2>
    
    <table class="table table-striped table-responsive w-100 mx-0">
        <thead>
            <tr>
                <th>Référence</th>
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
                    <td class="align-middle"><?= $avi['nom'] ?></td>
                    <td class="align-middle"><?= $avi['prenom'] ?></td>
                    <td class="align-middle"><?= $avi['note'] ?></td>
                    <td class="align-middle"><?= $avi['commentaire'] ?></td>
                    <td class="align-middle"><?= isset($avi['created_at']) ? $avi['created_at'] : '' ?></td>
                    <td class="align-middle"><?= isset($avi['updated_at']) ? $avi['updated_at'] : '' ?></td>
                    <td class="align-middle"><?= $avi['valide'] ? 'Validé' : 'Non Validé' ?></td>
                    
                    <td>
                   <form method="POST" action="<?= URL ?>back/espacepro/modificationavis">
    <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
    <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                        </form>
                    </td>
   
            <td><?= $avi['idAvis'] ?></td>
            <td><input type="text" name="nom" class="form-control" value="<?= $avi['nom'] ?>" /></td>
            <td><input type="text" name="prenom" class="form-control" value="<?= $avi['prenom'] ?>" /></td>
            <td><input type="number" name="note" class="form-control" value="<?= $avi['note'] ?>" /></td>
            <td><textarea name='commentaire' class="form-control" rows="4"><?= $avi['commentaire'] ?></textarea></td>
            <td>
                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>" />
                <button class="btn btn-primary" type="submit" name="valider">Valider</button>
            </td>
        </tr>
    </table>
</form>

                        
                            <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/visualisationavis">
                <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
            </form>
        

                        <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/suppressionavis" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
                            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        </form>
                        <form class="mb-2" method="POST" action="<?= URL ?>back/espacepro/validationavis">
    <input type="hidden" name="idAvis" value="<?= $avi['idAvis'] ?>">
    <?php
    if (!$avi['valide']) { // Vérifier si l'avis n'est pas encore validé
    ?>
        <button type="submit" class="btn btn-success" name="valider">Valider</button>
    <?php
    }
    ?>
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
