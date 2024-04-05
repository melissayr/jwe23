<?php

class Kreis { 
    //Konstate, die fix einer Klasse zugeordnet ist
    const PI = 3.141592654;

    private float $radius; //eigenschaft

    public function __construct(float $r) { //mit float fließkommazahl! raius kann kein string sein

        $this->radius = $r; //methode
    }

    public function flaeche(): float {
        //r² * PI 
       return pow($this->radius, 2) * self::PI; // pow = function radius hoch 2  // self = fixer Platzhalter für den KLASSEN NAMEN (zb Kreis)
    }

    public function durchmesser(): float {
        return $this->radius * 2;
    }

    public function umfang(): float {
        return 2 * $this->radius * self::PI ;
    }

    public function set_radius(float $neuerRadius): void {
        if($neuerRadius <=0) {
            //wirft eine Exception, die als Fehler am Bildschirm aufscheint.
            //Gibt Kollegen einen Hinweis, was sie falsch gemacht haben (die entwickler für index.php zb)
            throw new Exception("Radius muss größer 0 sein."); //neue Ausnahme(new Exception) vordefiniert von PHP! wenn Exception geworfen wird kann der code danach nicht ausgeführt werden 
        } //einen throw(wurf) muss man auch fangen 
        $this->radius = $neuerRadius;
    }
}