<?php
    class Security{
        public static function secureHtml($string){
                return htmlentities($string)//Convertir des caractères qui sont un peu spéciaux

        }

    }
?>