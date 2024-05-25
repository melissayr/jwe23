<?php
namespace WIFI\getajob\Klassen;

//Klasse Validieren für die Validierung
class validieren 
{   

    private array $errors = array();
                                    //in login $_POST Parameter hängen mit diesen beiden parametern zusammen 1 und 2 / 1 und 2
    public function ist_ausgefuellt(string $wert, string $feldname): bool // ist benutzername oder Pw ausgefüllt?
    {
        if (empty($wert)) { 
            $this->errors[] = $feldname  . " war leer.";
            return false;
        } //wenn $wert leer ist, dann fehlermeldung ansonsten true
        return true;
    }
    
    //Function für wenn ein Fehler aufgetreten ist - gibt bolean zurück
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