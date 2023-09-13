<?php ob_start(); ?>
 <!--pour commencer la temporisation de la sortie.
  Cela signifie que le contenu généré après cette instruction sera mis en mémoire tampon-->

 

    <div class="container-fluid no-margin">
        <h1 class="text-center">Liste des véhicules</h1>
        <table class="table table-striped mx-0"> <!-- Ajout de la classe mx-0 ici -->
            <thead>
                <tr>
                    <th scope="col">Référence</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Famille</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Modèle</th>
                    <th scope="col">Année</th>
                    <th scope="col">Kilométrage</th>
                    <th scope="col">Boite de Vitesse</th>
                    <th scope="col">Énergie</th>
                    <th scope="col">1ère mise en Circulation</th>
                    <th scope="col">Puissance</th>
                    <th scope="col">Places</th>
                    <th scope="col">Couleur</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Critère</th>
                    <th scope="col" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicules as $vehicule): ?>
                    <?php
                        // //Affichage des éléments
                        // if (empty($_POST['idVehicule']) || $_POST['idvehicule'] !== $vehicule['idvehicule']) :
                            // A gauche; l information qui a été posté et droite, c'est les informations de la bdd?>
                  
                    <tr>
                        <th scope="row"><?= $vehicule['idVehicule'] ?></th>
                        <td><?= $vehicule['imageVoiture'] ?></td>
                        <td><?= $vehicule['famille'] ?></td>
                        <td><?= $vehicule['marque'] ?></td>
                        <td><?= $vehicule['modele'] ?></td>
                        <td><?= $vehicule['annee'] ?></td>
                        <td><?= $vehicule['kilometrage'] ?></td>
                        <td><?= $vehicule['boitevitesse'] ?></td>
                        <td><?= $vehicule['energie'] ?></td>
                        <td><?= $vehicule['datecirculation'] ?></td>
                        <td><?= $vehicule['puissance'] ?></td>
                        <td><?= $vehicule['places'] ?></td>
                        <td><?= $vehicule['couleur'] ?></td>
                        <td><?= $vehicule['description'] ?></td>
                        <td><?= $vehicule['prix'] ?></td>
                        <td><?= $vehicule['imageCritere'] ?></td>

                        <td>
                        <form method="POST" action="">
                            <input type="hidden" name="vehicule_id" value="<?= $vehicule['idVehicule'] ?>">
                            <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
                        </form>
                
                </td>

                        <td>
                        <form method="POST" action="<?=URL?>back/espacepro/validationSuppression" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            <input type="hidden" name="vehicule_id" value="<?= $vehicule['idVehicule'] ?>">
                            <button type="submit" class="btn btn-danger" name="supprimer">Supprimer</button>
                        </form>
                        </td>
                    </tr>
                   
                    <?php if (isset($_POST['vehicule_id']) && $_POST['vehicule_id'] == $vehicule['idVehicule']): ?>
                    
                    <tr>
                    <form method="POST" action="<?= URL ?>back/espacepro/validationModification">
                        <td><?= $vehicule['idvehicule'] ?></td>
                        <td><input type="text" name="marque" class="form-control" value="<?= $vehicule['marque'] ?>" /></td>
                        <td><input type="text" name="modele" class="form-control" value="<?= $vehicule['modele'] ?>" /></td>
                        <td><input type="text" name="annee" class="form-control" value="<?= $vehicule['annee'] ?>" /></td>
                        <td><input type="text" name="kilometrage" class="form-control" value="<?= $vehicule['kilometrage'] ?>" /></td>
                        <td><input type="text" name="boitevitesse" class="form-control" value="<?= $vehicule['boitevitesse'] ?>" /></td>
                        <td><input type="text" name="energie" class="form-control" value="<?= $vehicule['energie'] ?>" /></td>
                        <td><input type="text" name="datecirculation" class="form-control" value="<?= $vehicule['datecirculation'] ?>" /></td>
                        <td><input type="text" name="puissance" class="form-control" value="<?= $vehicule['puissance'] ?>" /></td>
                        <td><input type="text" name="places" class="form-control" value="<?= $vehicule['places'] ?>" /></td>
                        <td><input type="text" name="couleur" class="form-control" value="<?= $vehicule['couleur'] ?>" /></td>
                        <td><textarea name='description' class="form-control" rows="3"><?= $vehicule['description'] ?></textarea></td>
                        <td><input type="text" name="prix" class="form-control" value="<?= $vehicule['prix'] ?>" /></td>
                        <td><input type="text" name="imageVoiture" class="form-control" value="<?= $vehicule['imageVoiture'] ?>" /></td>
                        <td><input type="text" name="imageCritere" class="form-control" value="<?= $vehicule['imageCritere'] ?>" /></td>
                        
                    
                        <td colspan="2">
                            <input type="hidden" name="idvehicule" value="<?= $vehicule['idvehicule'] ?>" />
                            <button class="btn btn-primary" type="submit">Valider</button>
                        </td>
                    </tr>
                </form>
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
