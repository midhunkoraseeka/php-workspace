<?php
function quietMessage(&$city){
    $new = strtolower($city);
    return $new;
}
$city = trim(fgets(STDIN));
$new = quietMessage($city);
echo $new;


?>