<?php
namespace WIFI\Php3\Fdb_Klassen;

class validieren 
{   
    public function istAusgefuellt(string $wert): bool 
    {
        if (empty($wert)) {
            return false;
        } //else
        return true;
    }
}