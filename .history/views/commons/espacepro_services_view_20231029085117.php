<?php ob_start(); ?>

<div class="container-fluid no-margin">
    <h2 class="text-center">Liste des services</h2>
    <table class="table table-striped table-responsive w-100 mx-0"> <!-- table-responsive pour gérer l'overflow horizontal -->
        <thead>
            <tr>
                <th scope="col">Référence</th>
                <th scope="col">Image Service</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Prix à partir de</th>
                <th scope="col">Date de création</th>
                <th scope="col">Date de mise à jour</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <th scope="row"><?= $service['idPrestation'] ?></th>
                    
                    <td class="align-middle">    <!-- Permettra de voir l'image ds l espace pro -->
                        <img src="<?= URL ?>public/images/<?= $service['imagePrestation'] ?>" style="width:150px"/>
                       
                    </td>

                    <td class="align-middle"><?= $service['famille'] ?></td>
                    <td class="align-middle"><?= $vehicule['marque'] ?></td>
                    <td class="align-middle"><?= $vehicule['modele'] ?></td>
                    <td class="align-middle"><?= $vehicule['annee'] ?></td>
                    <td class="align-middle"><?= $vehicule['kilometrage'] ?></td>
                    <td class="align-middle"><?= $vehicule['boitevitesse'] ?></td>
                    <td class="align-middle"><?= $vehicule['energie'] ?></td>
                    <td class="align-middle"><?= $vehicule['datecirculation'] ?></td>
                    <td class="align-middle"><?= $vehicule['puissance'] ?></td>
                    <td class="align-middle"><?= $vehicule['places'] ?></td>
                    <td class="align-middle"><?= $vehicule['couleur'] ?></td>
                    <td class="align-middle"><?= $vehicule['description'] ?></td>
                    <td class="align-middle"><?= $vehicule['prix'] ?></td>
                  
                    <td>    <!-- Permettra de voir l'image ds l'espace pro -->
                        <img src="<?= URL ?>public/images/<?= $vehicule['imageCritere'] ?>" style="width:150px;"/>
                    </td>
                    <td><?= isset($vehicule['created_at']) ? $vehicule['created_at'] : '' ?></td>
                    <td><?= isset($vehicule['updated_at']) ? $vehicule['updated_at'] : '' ?></td>
                    

                    <td>
                        <!-- Formulaire pour la modification -->
                        <form method="POST" action="<?= URL ?>back/espacepro/visualisationvoituresoccasions">
                            <input type="hidden" name="idVehicule" value="<?= $vehicule['idVehicule'] ?>">
                            <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <!-- Formulaire pour la suppression -->
                        <form method="POST" action="<?= URL ?>back/espacepro/suppressionvoituresoccasions" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="idVehicule" value="<?= $vehicule['idVehicule'] ?>">
                            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        </form>
                    </td>

                    </tr>
                
                <?php if (isset($_POST['modifier']) && $_POST['idVehicule'] == $vehicule['idVehicule']): ?>
                <tr>
                    <form method="POST" action="<?= URL ?>back/espacepro/visualisationvoituresoccasions">
                        <td><?= $vehicule['idVehicule'] ?></td>
                        <td><input type="text" name="imageVoiture" class="form-control" value="<?= $vehicule['imageVoiture'] ?>" /></td>
                        <td><input type="text" name="famille" class="form-control" value="<?= $vehicule['famille'] ?>" /></td>
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
$content = ob_get_clean();
$titre = "VOITURES D'OCCASIONS";
require_once(__ROOT__ . '\views\commons\template.php');
?>