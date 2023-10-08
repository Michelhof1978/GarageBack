<?php

function ajoutImage($file, $dir){
    if(!isset($file['name']) || empty($file['name']))//vérification si l image a bien été saisie
        throw new Exception("Vous devez indiquer une image");

    if(!file_exists($dir)) mkdir($dir,0777);//Si pas de répertoire de crée alors il va en créer un sur le serveur

    $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
    $random = rand(0,99999);//on va vérifier que ce fichier est unique
    $target_file = $dir.$random."_".$file['name'];
    
    if(!getimagesize($file["tmp_name"]))//vérifier que le fichier est bien une image
        throw new Exception("Le fichier n'est pas une image");
        //Vérification de la bonne extension
    if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
        throw new Exception("L'extension du fichier n'est pas reconnu");
    if(file_exists($target_file))
        throw new Exception("Le fichier existe déjà");
    if($file['size'] > 900000)//De préfér
        throw new Exception("Le fichier est trop gros");
    if(!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("l'ajout de l'image n'a pas fonctionné");
    else return ($random."_".$file['name']);
}