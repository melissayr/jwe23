<?php

class Hund extends TierAbstract { //extends  = erweitern(vererben) ist der Aufruf zur Vererbung dahinter der dateiname was alles vererbt wird - INCLUDE AUF INDEX.PHP!

    //extends TierAbstract kopiert alle Eigenschaften und Methoden von der übergeordneten "TierAbstract Klasse (die nicht privat sind).
    //Somit hat diese Klasse alle Möglichkeiten der Eltern Klasse.

    public function gib_laut(): string {
        return "Wuff!";
    }
    //gib laut bleibt weil jedes Tier einen anderen laut macht. Vererbung nicht möglich.
}