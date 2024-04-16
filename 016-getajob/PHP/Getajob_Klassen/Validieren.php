<?php
namespace WIFI\Php3\Getajob_Klassen;

class Validieren
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

    // LOGIN VALIDIEREN

    //HINTERHER JOBS UND KATEGORIE VALIDIEREN





    
    
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