<?php
require_once("controllers/filterscars.php");
$filters = ["marque"=>"citroen", "kilometremin"=>0, "kilometremax"=>200000, "anneemin"=>2000,"anneemax"=>2023,"prixmin"=>0,"prixmax"=>50000  ];
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