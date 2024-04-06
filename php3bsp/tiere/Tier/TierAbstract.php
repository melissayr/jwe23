<?php

//Abstract vor Klasse hießt: 
//diese Klasse muss "extended" werden!
//Sie kann nicht selbst als Objekt erstellt werden (instanziert).

abstract class TierAbstract {

    private string $name;

    public function __construct(string $tiername) {
        $this->name = $tiername;
    }

    public function get_name(): string {
        return $this->name;
    }

    //Abstract vor Methode heißt: diese Methode muss in Kind-Klassen überschrieben/implementiert werden.
    abstract public function gib_laut(): string; //jmd MUSS in Hund Katze Maus  gib_laut() einbauen.
}