<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "garage";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Pas d'insertion de données ici car c'est déjà inclus dans le manager

// Fermeture de la connexion
$pdo = null;
?>
