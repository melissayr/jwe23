<?php
namespace WIFI\JWE\Tier;


class Maus extends TierAbstract {
    // Wenn eine Methode definiert wird die mit selben Namen in der Elternklasse (TierAbstract )
    //bereits existiert, so wird diese überschrieben
    public function get_name(): string{
        $name = parent::get_name(); // parent::get_name() ruft von der Elternklasse (TierAbstract)
        //die Methode "get_name()" auf und wir können den Rückgabewert
        //in unserer überschriebenen Methode weiter verwenden.
        return $name . "(Maus)";
    }
    
    public function gib_laut(): string {
        return "Peip!";
    }

}