<?php
//TESTE DE CONNEXION
$login = "admin"; // Remplacez par le login correct
$passwordToCheck = "michelaquiche"; // Mot de passe saisi lors du test

$hashedPasswordFromDatabase = "$2y$10$OyS4Ak9w1C8IK5uHg3itYOFQWD0axk5QPX6G7q6TcVS.UB1IqusY2"; // Remplacez par le mot de passe haché correct

if (password_verify($passwordToCheck, $hashedPasswordFromDatabase)) {
    echo "Connexion réussie !";
//  } //else {
// //      echo "Échec de la connexion.";
// //}


