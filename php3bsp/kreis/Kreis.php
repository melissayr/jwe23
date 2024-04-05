<?php

/**
 * Diese Blöcke sind Beispiele für "phpDoc" /  "DocBlock"
 * und können mit phpDocumentor verarbeitet werden. 
 */

class Kreis { 
    //Konstate, die fix einer Klasse zugeordnet ist
    const PI = 3.141592654;

    private float $radius; //Eigenschaft

    public function __construct(float $r) { //mit float fließkommazahl! raius kann kein string sein

        $this->set_radius ($r); //Methode 
    }

    //Der Destruktor wird auf jeden Fall ausgeführt, wenn das Objekt gelöscht wird
    //Die kann über unset $k durch den Programmierer passieren,
    //oder automatisch durch PHP wenn das Programm zu Ende durchgelaufen ist.
    public function __destruct() {
        echo "Kreis im Radius " . $this->radius . " wurde zerstört.<br>";
    }

    public function flaeche(): float {
        //r² * PI 
       return pow($this->radius, 2) * self::PI; // pow = function radius hoch 2  // self = fixer Platzhalter für den KLASSEN NAMEN (zb Kreis)
    }

    public function durchmesser(): float {
        return $this->radius * 2;
    }

    /** Brechnet anhand des geg. Radius den Umfang d. Kreises
    * @return float  Der berechnete Umfang d Kreises
    */

    public function umfang(): float {
        return 2 * $this->radius * self::PI ;
    }
    /**
     * Setzt einen neuen Radius für den Kreis. Auch der Kreis bereits existiert und mir einem Radius im Konstruktor befüllt wurde,
     * kann man so einen neuen Radius setzen.
     * @param int|float $neuerRadius der neue Radius der gesetzt werden soll.
     * @return void
     * @throws Exception
     */

    public function set_radius(float $neuerRadius): void {
        if($neuerRadius <=0) {
            //wirft eine Exception, die als Fehler am Bildschirm aufscheint.
            //Gibt Kollegen einen Hinweis, was sie falsch gemacht haben (die entwickler für index.php zb)
            throw new Exception("Radius muss größer 0 sein."); //neue Ausnahme(new Exception) vordefiniert von PHP! wenn Exception geworfen wird kann der code danach nicht ausgeführt werden 
        } //einen throw(wurf) muss man auch fangen 

        $this->radius = $neuerRadius;
    }
}