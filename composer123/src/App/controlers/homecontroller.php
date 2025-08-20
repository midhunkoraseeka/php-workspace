<?php
namespace App\controlers;
class homecontroller{
    public function hello(){
        echo "HEllooooooo";
        $data='this is a dynamic variable';
        include './view/view.php';
    }
}

?>