<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

    class Securite{
        public static function secureHtml($string){
                return htmlentities($string); //Convertir en html des caractères qui sont un peu spéciaux pour éviter ainsi certains problèmes

        }
        public static function verifAccessSession(){
            return (!empty($_SESSION['access'])) 
        }

    }
?>