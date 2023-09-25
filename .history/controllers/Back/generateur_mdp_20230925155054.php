<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('controllers/back/security.class.php'); // Assurez-vous d'inclure le fichier de la classe Securite

class PasswordGenerator {
    public static function generateHashedPassword($plainPassword) {
        // Générez le mot de passe haché en utilisant password_hash
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
        return $hashedPassword;
    }
}

// Utilisez la fonction pour générer le mot de passe haché
$plainPassword = "michelaquiche"; // Mot de passe en clair pour les tests
$hashedPassword = PasswordGenerator::generateHashedPassword($plainPassword);

echo "Mot de passe en clair : $plainPassword\n";
echo "Mot de passe haché : $hashedPassword\n";
?>
