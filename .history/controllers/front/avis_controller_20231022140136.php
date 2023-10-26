<?php
// Connexion à la base de données (à ajuster avec vos propres informations)
$host = "localhost";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$database = "votre_base_de_données";

$mysqli = new mysqli($host, $username, $password, $database);

// Vérification de la connexion à la base de données
if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}

// Route pour ajouter un avis client
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['prenom'], $_POST['contenu'], $_POST['note'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $contenu = $_POST['contenu'];
    $note = $_POST['note'];

    // Requête d'insertion dans la base de données
    $sql = "INSERT INTO avis (nom, prenom, contenu, note) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    // Vérification de la requête préparée
    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $mysqli->error);
    }

    // Liaison des paramètres et exécution de la requête
    $stmt->bind_param("sssi", $nom, $prenom, $contenu, $note);

    if ($stmt->execute()) {
        // Succès : avis ajouté à la base de données
        echo json_encode(array("message" => "Avis ajouté avec succès."));
    } else {
        // Échec : erreur d'ajout de l'avis
        echo json_encode(array("message" => "Erreur lors de l'ajout de l'avis."));
    }

    // Fermeture de la requête préparée
    $stmt->close();
}

// Route pour récupérer tous les avis
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $avis = array();
    $result = $mysqli->query("SELECT * FROM avis");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $avis[] = $row;
        }

        // Renvoie la liste des avis au format JSON
        echo json_encode($avis);
    }
}

// Fermeture de la connexion à la base de données
$mysqli->close();
