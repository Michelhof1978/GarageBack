<?php
:require_once("filterscars.php");
$filters = ["marque"=>"citroen", "kilometremin"=>0, "kilometremax"=>200000, "anneemin"=>2000,"anneemax"=>2023,"prixmin"=>0,"prixmax"=>50000  ];

   
$controller = new APIController();

$controller->getCarsByFilters($filters)



?>