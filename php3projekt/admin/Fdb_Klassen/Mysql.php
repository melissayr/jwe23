<?php

namespace WIFI\Php3\Fdb_Klassen;

class Mysql 
{
    private \mysqli $db;

    public function __construct()
    {   //Mysqli-Objekt von PHP erstellen und DB Verbindung aufbauen
        $this->db = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORT, MYSQL_DATENBANK);
        //Zeichensatz mitteilen, in dem wir mit der DB sprechen wollen
        $this->db->set_charset("utf8mb4");
    }
       
    public function escape(string $wert): string 
    {
         return $this->db->real_escape_string($wert);
    }
}