<?php

$login = "admin"; // Remplacez par le login correct
$passwordToCheck = "michelaquiche"; // Mot de passe saisi lors du test

$hashedPasswordFromDatabase = "$2y$10\$XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"; // Remplacez par le mot de passe haché correct

if (password_verify($passwordToCheck, $hashedPasswordFromDatabase)) {
    echo "Connexion réussie !";
 } //else {
//      echo "Échec de la connexion.";
}


//Récupération du mot de passe michelaquiche qui sera haché, permettra de recuperer ce hachage et de l insérer ds la bdd
// $plainPassword = "michelaquiche"; // Mot de passe en clair pour les tests
// $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// echo "Mot de passe en clair : $plainPassword\n";
// echo "Mot de passe haché : $hashedPassword\n";
