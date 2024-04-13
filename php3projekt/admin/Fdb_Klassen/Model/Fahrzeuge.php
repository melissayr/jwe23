<?php
 namespace WIFI\Php3\Fdb_Klassen\Model;

 use WIFI\Php3\Fdb_Klassen\Mysql;
 use WIFI\Php3\Fdb_Klassen\Model\Row\Fahrzeug;


 class Fahrzeuge 
 {
    public function alle_fahrzeuge(): array
    {   
        $alle_fahrzeuge = array();

        $db = new Mysql;
        $ergebnis = $db->query("SELECT * FROM fahrzeuge ORDER BY id ASC");

        while($row = $ergebnis->fetch_assoc()){
            $alle_fahrzeuge[] = new Fahrzeug($row);
        }
        return $alle_fahrzeuge;
    }

 }

 