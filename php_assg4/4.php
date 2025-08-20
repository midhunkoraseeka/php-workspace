<?php
function findStudent($array, $student){
    $found = array_search($student, $array);
    return $found;
}
$array = ["Valorant", "Free_Fire", "BGMI"];
$student = trim(fgets(STDIN));
$found = findStudent($array, $student);
print_r($found);
?>