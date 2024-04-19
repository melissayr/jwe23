<?php

namespace WIFI\JWE;

use WIFI\JWE\Test;

class Frachtschiff{
   
    private $kmh;
    

    public function __construct($frachtschiff) {
        $this->kmh = 5 . " kmh";
    }


    public function rechnen2() {
        return ($this->kmh);
        }
}



//d = v * t / 60
//d = 12 Knoten * 26 Minuten / 60 Minuten = 312 / 60
//d = 5,2 Seemeilen (sm bzw. nm)