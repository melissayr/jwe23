<?php

namespace WIFI\getajob\Klassen\Model\Row;

use WIFI\getajob\Klassen\Mysql;

abstract class RowAbstract // class Job -> :  new "Job" wird vom Constructor aufgerufen

{
    protected string $tabelle;

    private array $daten = array();

    public function __construct(array|int $id_oder_daten)
    //speichern in $daten
    {   
        if(is_array($id_oder_daten)) {
            //Fertiges array wurde übergeben, verwenden wie gegeben.
            $this->daten = $id_oder_daten;
        } else {
            //id wurde übergeben, Daten aus Datenbank auslesen
            $db = Mysql::getInstanz();
            $sql_id = $db ->escape($id_oder_daten);
            $ergebnis = $db->query("SELECT * FROM {$this->tabelle} WHERE id = '{$sql_id}'");
            $this->daten = $ergebnis->fetch_assoc();
        }
    }

}
