<?php
function removeLastTask(&$array){
    array_pop($array);
}
$array = ["Cooking", "Reading", "Playing"];
removeLastTask($array);
print_r($array)

?>