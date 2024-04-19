<?php

namespace WIFI\JWE\Car;


class Vw extends CarAbstract {
    // Wenn eine Methode definiert wird die mit selben Namen in der Elternklasse (TierAbstract )
    //bereits existiert, so wird diese überschrieben
    public function darstellen(): string{
        $marke = parent::darstellen(); // parent::get_name() ruft von der Elternklasse (TierAbstract)

        return $marke . "(Vw)";
    }
    
    public function get_marke(): string {
        return "Das ist die " . $this->marke;
    }

}

