<?php

$familleArray = "berline,renault,fiat";
$array = explode(",", $familleArray);
$placeholders = implode(', ', array_fill(0, count($array), '?'));
echo $array;

$familleArray = "berline,renault,fiat";

// Step 1: Split the string into an array of values
$values = explode(',', $familleArray);

echo $values;