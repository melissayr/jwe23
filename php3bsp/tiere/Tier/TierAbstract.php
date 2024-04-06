<?php
namespace WIFI\JWE\Tier;
//Eigener Namensraum für das Projekt bzw. für diese Klasse
//Wird verwendet um gleich benannte Klassen in Verschiedenen Projekten zu erlauben zb. Wenn man ext. software einbindet und da kommt auch der name "Maus" vor gibt es keinen Fehler
//da alles in eigenem Bereich erlaubt wird



//Abstract vor Klasse hießt: 
//diese Klasse muss "extended" werden!
//Sie kann nicht selbst als Objekt erstellt werden (instanziert).

abstract class TierAbstract {

    private string $name; // protected - Man kann innerhalb dieser klasse und deren Vererbung darauf zugreifen! Diese Klasse und Kind-Klassen können diese Eigenschaft verwenden.
    //private - ist NUR in der TierAbstarct und ausschließlich diese  Klasse kann die Eigenschaft verwenden.
    //public - könnte JEDER darauf zugreifen und verändern (kann von "außen gelesen o. geändert werden)
    //Man startet so streng wie möglich mit private!

    public function __construct(string $tiername) {
        $this->name = $tiername;
    }

    public function get_name(): string {
        return $this->name;
    }

    //Abstract vor Methode heißt: diese Methode muss in Kind-Klassen überschrieben/implementiert werden.
    abstract public function gib_laut(): string; //jmd MUSS in Hund Katze Maus  gib_laut() einbauen.
}