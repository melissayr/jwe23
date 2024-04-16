<?php
namespace WIFI\Php3\Fdb_Klassen;

class validieren 
{   

    private array $errors = array();
                                    //in login $_POST Parameter hängen mit diesen beiden parametern zusammen 1 und 2 / 1 und 2
    public function ist_ausgefuellt(string $wert, string $feldname): bool 
    {
        if (empty($wert)) {
            $this->errors[] = $feldname  . " war leer.";
            return false;
        } //else
        return true;
    }

    public function ist_kennzeichen(string $wert, string $feldname): bool
    {   
        //nach irgendeinem Kennzeichen suchen, das NICHT ^ A-Z, 0-9, oder Bindestrich ist.
        if (preg_match("/[^A-Z0-9\-]/i", $wert)){ // alles was NICHT diese Zeichen sind, ist ein Fehler zb Sonderzeichen usw.
            $this->errors[] = "Im " . $feldname  . " sind nur Buchstaben, Zahlen und Minus erlaubt.";
            return false;
        }
        //auf korrekte Länge prüfen
        if(strlen($wert) > 8 || strlen($wert) < 3){

        $this->errors[] = "Die Länge von " . $feldname  . " scheint falsch zu sein.";
            return false;
        }

        return true; //wenn er in die IF drüber nicht reingegangen ist, ist alles ok 
    }





    public function ist_jahr(string $wert, string $feldname): bool
    {   //muss eine zahl sein
        if(!is_numeric($wert)) {
            $this->errors[] = "Im " . $feldname  . " dürfen nur Zahlen verwendet werden.";
            return false;
        }

        //auf korrekte Länge prüfen - Jahr kann nur 4 zahlen sein
        if(strlen($wert) != 4 ){ //  ungleich 4   oder strlen($wert) > 4 || strlen($wert) < 4

            $this->errors[] = "Die Länge von " . $feldname  . " scheint falsch zu sein.";
            return false;
        }

        if (date("Y") < $wert || $wert < 1890) {
            $this->errors[] = "Das " . $feldname  . " kann nicht in der Zukunft liegen und muss größer als 1890 sein.";
            return false;
        }

        return true; //wenn er in die IF drüber nicht reingegangen ist, ist alles ok 
    }





    
    
    public function fehler_aufgetreten(): bool
    {
        if (empty($this->errors)) {
            return false;
        }
        return true;
    }

    public function fehler_hinzu(string $fehler): void //wenn es keinen rückgabewert gibt (string oder bool o.ä) dann void leer 
    {
        $this->errors[] = $fehler;
    }



    public function fehler_html(): string
    {
        if (!$this->fehler_aufgetreten()) {
            return "";
        }



        $ret = "<ul>";
        foreach($this->errors as $error){
        $ret .= "<li>" . $error . "</li>";
        } $ret .= "</ul>";
        return $ret;
    }
}