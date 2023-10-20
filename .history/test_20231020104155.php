<?

$familleArray = "berline,renault,fiat"
$array = explode(",", $familleArray);
$placeholders = implode(', ', array_fill(0, count($array), '?'));
echo $placeholders