<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

    class Securite{
        public static function secureHtml($string){
                return htmlentities($string); //Convertir en html tous des caractères spéciaux pour éviter ainsi certains problèmes

        }
        //test de variable de session si elle existe et remplie et qui contient bien les infos admin en répondant par true ou false
        public static function verifAccessSession(){
            return (!empty($_SESSION['access']) && $_SESSION['access'] == "admin"); 
        }

    }
?>