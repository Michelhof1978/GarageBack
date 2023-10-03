<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');


//permet de prévenir certaines vulnérabilités, telles que les attaques par injection  

>>>>>>> c51090e149b9839951561128d8151391c68917cb
    class Securite{
        public static function secureHtml($string){
                return htmlentities($string); //Convertir en html tous les caractères spéciaux pour éviter ainsi certains problèmes comme des injections d url

        }
        //test de variable de session si elle existe et remplie et qui contient bien les infos admin en répondant par true ou false
        public static function verifAccessSession(){
            return (!empty($_SESSION['access']) && $_SESSION['access'] == "admin"); 
        }

    }
?>