<?php
 namespace WIFI\getajob\Klassen\Model;

 use WIFI\getajob\Klassen\Mysql;
 use WIFI\getajob\Klassen\Model\Row\Kategorie;


 class Kategorien
 {
    public function alle_kategorien(): array
    {   
        $alle_marken = array();
        $db = Mysql::getInstanz();
        $ergebnis = $db->query("SELECT * FROM kategorien ORDER BY id ASC");

        while($row = $ergebnis->fetch_assoc()) {
            $alle_kategorien[] = new Kategorie($row);
        }
        return $alle_kategorien;
    }

 }



 




 