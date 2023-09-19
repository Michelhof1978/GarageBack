<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link>
    
        <title>Document</title>
</head>
<body>
    <?php require_once("views/commons/menu.php"); ?>
    
    <!-- On va afficher le contenu de la variable content qui est rempli depuis la page login view -->
       <div>
       
       <h1 class="rouded border border-dark m-2 text-center text white"></h1><h1><?= $titre ?></h1>
<?= $content ?>

    </div>
    <script src=>"https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"</script>
</body>
</html>