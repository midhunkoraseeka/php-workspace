<?php
function checkNameLength($Name){
    $length = strlen($Name);
    return $length;
}
$Name = trim(fgets(STDIN));
$length = checkNameLength($Name);
echo $length;
?>