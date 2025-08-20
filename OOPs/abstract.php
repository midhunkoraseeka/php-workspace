<?php

abstract class vehicle{
    public $value;
    abstract public function start($name);
}

class bike extends vehicle {
    public $value = 'bike';

    public function start($name){
        echo "hello world".$name    ;
    }
}



?>