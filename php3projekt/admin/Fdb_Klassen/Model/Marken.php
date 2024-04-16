<?php
 namespace WIFI\Php3\Fdb_Klassen\Model;

 use WIFI\Php3\Fdb_Klassen\Mysql;
 use WIFI\Php3\Fdb_Klassen\Model\Row\Marke;


 class Marken 
 {
    public function alle_marken(): array
    {   
        $alle_marken = array();
        $db = Mysql::getInstanz();
        $ergebnis = $db->query("SELECT * FROM marken ORDER BY hersteller ASC");

        while($row = $ergebnis->fetch_assoc()) {
            $alle_marken[] = new Marke($row);
        }
        return $alle_marken;
    }

 }

 