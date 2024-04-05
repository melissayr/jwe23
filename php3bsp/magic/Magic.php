<?php

class Magic {
    //speichert alle Eigenschaften über die __set(), die nicht als selbstständige Eigenschaften existieren. 
    private array $daten = array();

    // set: wird von außen eine Eigenschaft GESETZT, die es hier im Objekt nicht gibt, wird automatisch die _set()-Magic-Method verwendet

                        //vorname , Maria
                        //nachname , hauser
    public function __set($variable, $wert) {
        $this->daten[$variable] =  $wert;
    }


    // get: wird von außen eine Eigenschaft VERWENDET, die es hier im Objekt nicht gibt, wird automatisch die _get()-Magic-Method verwendet
    public function __get($variable) {
        return $this->daten[$variable];
    }

    //Wird eine METHODE (Funktion)  aufgerufen die es hier im Objekt nicht gibt, wird automatisch die __call()-Magic-Method verwendet.
    public function __call($methode, $parameter) {
        echo "Es wurde die Methode  " . $methode . " aufgerufen.";
        echo "<pre>";
        print_r($parameter);
        echo "<pre>";

    }

    //Wird ein koplettes Objekt als String verwendet zb mit echo, so verwendet PHP den Rückgabewert der toString()-Magic-Method
    public function __toString() {
        return print_r($this->daten, true);
    }
}