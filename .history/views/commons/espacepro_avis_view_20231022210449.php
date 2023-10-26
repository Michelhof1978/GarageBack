<!DOCTYPE html>
<html>
<head>
    <title>Liste des avis clients</title>
</head>
<body>
    <h1>Liste des avis clients</h1>
    <table>
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
</body>
</html>
