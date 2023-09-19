<?php
    class Security{
        public static function secureHtml($string){
                return htmlentities($string)//Convertir en html des caractères qui sont un peu spéciaux

        }

    }
?>