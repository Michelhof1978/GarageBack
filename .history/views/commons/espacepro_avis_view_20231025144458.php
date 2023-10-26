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
                    <form method="POST" action="<?= URL ?>back/espacepro/visualisationavis">
                        <td><?= $avi['idAvis'] ?></td>
                        <td><input type="text" name="nom" class="form-control" value="<?= $nom['nom'] ?>" /></td>
                        <td><input type="text" name="prenom" class="form-control" value="<?= $vehicule['famille'] ?>" /></td>
                        <td><input type="text" name="marque" class="form-control" value="<?= $vehicule['marque'] ?>" /></td>
                        <td><input type="text" name="modele" class="form-control" value="<?= $vehicule['modele'] ?>" /></td>
                        <td><input type="number" name="annee" class="form-control" value="<?= $vehicule['annee'] ?>" /></td>
                        <td><input type="number" name="kilometrage" class="form-control" value="<?= $vehicule['kilometrage'] ?>" /></td>
                        <td><input type="text" name="boitevitesse" class="form-control" value="<?= $vehicule['boitevitesse'] ?>" /></td>
                        <td><input type="text" name="energie" class="form-control" value="<?= $vehicule['energie'] ?>" /></td>
                        <td><input type="text" name="datecirculation" class="form-control" value="<?= $vehicule['datecirculation'] ?>" /></td>
                        <td><input type="number" name="puissance" class="form-control" value="<?= $vehicule['puissance'] ?>" /></td>
                        <td><input type="number" name="places" class="form-control" value="<?= $vehicule['places'] ?>" /></td>
                        <td><input type="text" name="couleur" class="form-control" value="<?= $vehicule['couleur'] ?>" /></td>
                        <td><textarea name='description' class="form-control" rows="4"><?= $vehicule['description'] ?></textarea></td>
                        <td><input type="number" name="prix" class="form-control" value="<?= $vehicule['prix'] ?>" /></td>
                        <td><input type="text" name="imageCritere" class="form-control" value="<?= $vehicule['imageCritere'] ?>" /></td>


                        <td colspan="2">
                            <input type="hidden" name="idVehicule" value="<?= $vehicule['idVehicule'] ?>" />
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
