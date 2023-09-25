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


