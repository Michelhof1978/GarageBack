$login = "utilisateur_test"; // Remplacez par le login correct
$passwordToCheck = "michelaquiche"; // Mot de passe saisi lors du test

$hashedPasswordFromDatabase = "$2y$10\$XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"; // Remplacez par le mot de passe haché correct

if (password_verify($passwordToCheck, $hashedPasswordFromDatabase)) {
    echo "Connexion réussie !";
} else {
    echo "Échec de la connexion.";
}
