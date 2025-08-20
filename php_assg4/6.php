<?php
function shoutCity(&$city){
    $new = strtoupper($city);
    return $new;
}
$city = trim(fgets(STDIN));
$new = shoutCity($city);
echo $new;


?>