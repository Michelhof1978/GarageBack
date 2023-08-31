<?php
require_once("controllers/filterscars.php");
$filters = []
$filters=['marque'] {
    $sql .= " AND marque = :marque";
}

if ($filters['kilometremin']) {
    $sql .= " AND kilometrage >= :kilometremin";
}

if ($filters['kilometremax']) {
    $sql .= " AND kilometrage <= :kilometremax";
}

if ($filters['anneemin']) {
    $sql .= " AND annee >= :anneemin";
}
if ($filters['anneemax']) {
    $sql .= " AND annee <= :anneemax";
}

if ($filters['prixmin']) {
    $sql .= " AND prix >= :prixmin";
}

if ($filters['prixmax']) {
    $sql .= " AND prix <= :prixmax";
}




?>