<?php
// // Connexion à la base de données
// $host = "localhost";
// $dbname = "garage";
// $username = "root";
// $password = "";

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Erreur de connexion à la base de données: " . $e->getMessage());
// }

// // Données à insérer
// $famille = "Famille de la voiture";
// $marque = "Marque de la voiture";
// $modele = "Modèle de la voiture";
// $annee = 2023;
// $kilometrage = 50000;
// $boitevitesse = "Automatique";
// $energie = "Essence";
// $datecirculation = "2023-01-01"; // Format YYYY-MM-DD
// $puissance = "150 ch";
// $places = 5;
// $couleur = "Rouge";
// $reference = "REF12345";
// $prix = 20000.00;
// $imageVoiture = "chemin/vers/image.jpg";
// $imageCritere = "chemin/vers/critere.jpg";
// $description = "Description de la voiture";

// // Requête d'insertion
// $sql = "INSERT INTO vehicule (famille, marque, modele, annee, kilometrage, boitevitesse, energie, datecirculation, puissance, places, couleur, reference, prix, imageVoiture, imageCritere, description)
//         VALUES (:famille, :marque, :modele, :annee, :kilometrage, :boitevitesse, :energie, :datecirculation, :puissance, :places, :couleur, :reference, :prix, :imageVoiture, :imageCritere, :description)";

// try {
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindParam(':famille', $famille);
//     $stmt->bindParam(':marque', $marque);
//     $stmt->bindParam(':modele', $modele);
//     $stmt->bindParam(':annee', $annee);
//     $stmt->bindParam(':kilometrage', $kilometrage);
//     $stmt->bindParam(':boitevitesse', $boitevitesse);
//     $stmt->bindParam(':energie', $energie);
//     $stmt->bindParam(':datecirculation', $datecirculation);
//     $stmt->bindParam(':puissance', $puissance);
//     $stmt->bindParam(':places', $places);
//     $stmt->bindParam(':couleur', $couleur);
//     $stmt->bindParam(':reference', $reference);
//     $stmt->bindParam(':prix', $prix);
//     $stmt->bindParam(':imageVoiture', $imageVoiture);
//     $stmt->bindParam(':imageCritere', $imageCritere);
//     $stmt->bindParam(':description', $description);

//     $stmt->execute();
//     echo "Données insérées avec succès!";
// } catch (PDOException $e) {
//     die("Erreur lors de l'insertion des données: " . $e->getMessage());
// }

// // Fermeture de la connexion
// $pdo = null;
?>
