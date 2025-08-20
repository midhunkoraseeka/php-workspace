<?php
function addToCart(&$array){
    array_push($array, "Charger", "Earphones");
}
$array = ["Laptop", "Mobile"];
addToCart($array);
print_r($array)
?>