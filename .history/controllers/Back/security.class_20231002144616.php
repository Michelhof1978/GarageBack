<?php
//Aide pour meilleur affichage des description des erreurs ds la console
error_reporting(E_ALL);
ini_set('display_errors', '1');

//permet de prévenir certaines vulnérabilités, telles que les attaques par injection XSS (Cross-Site Scripting). En d'autres termes, elle échappe les caractères spéciaux pour les rendre inoffensifs dans le contenu HTML. Par exemple, si vous avez du texte qui contient des balises HTML ou des caractères spéciaux comme <, >, &, etc., cette méthode les convertira en entités HTML pour les afficher correctement dans une page web sans provoquer d'exécution de code malveillant.

verifAccessSession() : Cette méthode vérifie si une variable de session appelée access existe, n'est pas vide et contient la valeur "admin". Elle renverra true si toutes ces conditions sont remplies, indiquant ainsi que l'utilisateur a accès à des fonctionnalités administratives. Cette méthode peut être utilisée pour restreindre l'accès à certaines parties de votre application aux administrateurs.

En résumé, la classe Securite fournit des méthodes utiles pour sécuriser les données affichées dans votre application et vérifier les autorisations d'accès. Elle peut contribuer à renforcer la sécurité de votre application web en prévenant les attaques courantes.






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