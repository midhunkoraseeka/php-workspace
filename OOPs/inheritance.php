<?php

class color{
    public function printdata(){
        echo "this is color";
    }
}

class blue extends color{

public $color;

function __construct($color){
    $this->color = $color;
}
    public function printdata(){
        echo "this is color".$this->color;
    }
}

$first=new color();
$first->printdata();
$name = 'blue';
$second = new blue($name);
$second->printdata();

?>