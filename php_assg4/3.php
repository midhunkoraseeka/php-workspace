<?php
function findStudent($array1, $array2){
    $merged = array_merge($array1, $array2);
    return $merged;
}
$array1 = ["Cheese", "Butter"];
$array2 = ["Burger", "Pizza"];
$merged = findStudent($array1, $array2);
print_r($merged);
?>