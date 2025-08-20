<?php

interface example {
    public function world();
    public function hello($name);
}

class color implements example {
    public function world() {
        echo "hello world <br/>";
    }

    public function hello($name) {
        echo "hello, $name <br/>";
    }
}


$obj = new color();
$obj->world();
$obj->hello("Midhun");

?>
