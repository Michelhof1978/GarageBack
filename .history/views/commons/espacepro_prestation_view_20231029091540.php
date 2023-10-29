<?php ob_start(); ?>

<div class="container-fluid no-margin">
    <h2 class="text-center">Liste des prestations</h2>
    <table class="table table-striped table-responsive w-100 mx-0"> <!-- table-responsive pour gérer l'overflow horizontal -->
        <thead>
            <tr>
                <th scope="col">Référence</th>
                <th scope="col">Image prestation</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Prix à partir de</th>
                <th scope="col">Date de création</th>
                <th scope="col">Date de mise à jour</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($prestations as $prestation): ?>
                <tr>
                    <th scope="row"><?= $prestation['idPrestation'] ?></th>
                    
                    <td class="align-middle">    <!-- Permettra de voir l'image ds l espace pro -->
                        <img src="<?= URL ?>public/images/<?= $prestation['imagePrestation'] ?>" style="width:150px"/>
                       
                    </td>

                    <td class="align-middle"><?= $prestation['nom'] ?></td>
                    <td class="align-middle"><?= $prestation['description'] ?></td>
                    <td class="align-middle"><?= $prestation['prix'] ?></td>
                  
                    <td><?= isset($prestation['created_at']) ? $prestation['created_at'] : '' ?></td>
                    <td><?= isset($prestation['updated_at']) ? $prestation['updated_at'] : '' ?></td>
                    

                    <td>
                        <!-- Formulaire pour la modification -->
                        <form method="POST" action="<?= URL ?>back/espacepro/visualisationprestation">
                            <input type="hidden" name="idPrestation" value="<?= $vehicule['idPrestation'] ?>">
                            <button type="submit" class="btn btn-warning" name="prestation">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <!-- Formulaire pour la suppression -->
                        <form method="POST" action="<?= URL ?>back/espacepro/suppressionprestation" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="idPrestation" value="<?= $prestation['idPrestation'] ?>">
                            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        </form>
                    </td>

                    </tr>
                
                <?php if (isset($_POST['modifier']) && $_POST['idPrestation'] == $prestation['idPrestation']): ?>
                <tr>
                    <form method="POST" action="<?= URL ?>back/espacepro/visualisationprestation">
                        <td><?= $prestation['idPrestation'] ?></td>
                        <td><input type="text" name="imagePrestation" class="form-control" value="<?= $prestation['imagePrestation'] ?>" /></td>
                        <td><input type="text" name="nom" class="form-control" value="<?= $prestation['nom'] ?>" /></td>
                        <td><textarea name='description' class="form-control" rows="4"><?= $prestation['description'] ?></textarea></td>
                        <td><input type="number" name="prix" class="form-control" value="<?= $prestation['prix'] ?>" /></td>
                      
                        <td colspan="2">
                            <input type="hidden" name="idPrestation" value="<?= $['idPrestation'] ?>" />
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
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require_once(__ROOT__ . '\views\commons\template.php');
?>