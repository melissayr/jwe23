<?php

class Car {

    private $marke;

    public function __construct($markenname) {
        $this->marke = $markenname;
    }

    public function darstellen() {
        return "Das ist die Marke " . $this->marke;
    }

    public function get_marke() {
        return $this->marke;
    }

}


   
    



