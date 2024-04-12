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

    public function fehler_html(): string
    {
        if (empty($this->errors)) {
            return "";
        }



        $ret = "<ul>";
        foreach($this->errors as $error){
        $ret .= "<li>" . $error . "</li>";
        } $ret .= "</ul>";
        return $ret;
    }
}