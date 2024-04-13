<?php

namespace WIFI\Php3\Fdb_Klassen\Model\Row;

use WIFI\Php3\Fdb_Klassen\Mysql;

class Fahrzeug // class Fahrzeug -> :  new "Fahrzeug" wird vom Constructor aufgerufen
{   
    private array $daten = array();

    public function __construct(array $daten) 
    //speichern in $daten
    {
        $this->daten = $daten;
    }

    public function __get(string $eigenschaften): mixed //obj, array, int .. = mixed
    {
        return $this->daten[$eigenschaften];
    }

    public function speichern(): void
    {
        $db = new Mysql();

        //Felder für SQL-Abfrage zusammen bauen
        $sql_felder = "";

        foreach($this->daten as $spaltenname => $wert) {
            $sql_wert = $db->escape($wert);
            $sql_felder .= "{$spaltenname} = '{$sql_wert}', ";
        }
        $sql_felder = rtrim($sql_felder, ", "); //letztes  "," Komma entfernen
       
        //in DB einfügen
        $db->query("INSERT INTO fahrzeuge SET {$sql_felder}");

    }

}