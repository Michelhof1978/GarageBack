<!DOCTYPE html>
<html>
<head>
    <title>Liste des avis clients</title>
    <!-- Inclure les styles CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Liste des avis clients</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Avis</th>
                    <th>Nom Clients</th>
                    <th>Prénom Clients</th>
                    <th>Note</th>
                    <th>Contenu</th>
                    <th>Date de création</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avis as $avi): ?>
                    <tr>
                        <td><?= $avi['id'] ?></td>
                        <td><?= $avi['nom'] ?></td>
                        <td><?= $avi['prenom'] ?></td>
                        <td><?= $avi['note'] ?></td>
                        <td><?= $avi['contenu'] ?></td>
                        <td><?= $avi['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Inclure les scripts JavaScript de Bootstrap (facultatif) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Récupération du contenu mis en mémoire tampon et nettoyage de la mémoire tampon
$content = ob_get_clean();
$titre = "Avis Clients";
require "views/commons/template.php";
?>
