<?php

namespace WIFI\Php3\Fdb_Klassen;

class Mysql 
{
    private \mysqli $db;

    public function __construct()

    {
        $this->verbinden();

    //     $this->einstellung = "asdf";
    //     $this->query("");
    // 
    }

    public function verbinden()

    {   //Mysqli-Objekt von PHP erstellen und DB Verbindung aufbauen
        $this->db = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORT, MYSQL_DATENBANK);
        //Zeichensatz mitteilen, in dem wir mit der DB sprechen wollen
        $this->db->set_charset("utf8mb4");

        
    }
       
    public function escape(string $wert): string 
    {
         return $this->db->real_escape_string($wert);
    }

    public function query(string $input): \mysqli_result|bool  //  -> mysqli_result   | (oder)  bool
    {
        $ergebnis = $this->db->query($input);
        return $ergebnis;
    }
}