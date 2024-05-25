<?php

namespace WIFI\getajob\Klassen;

class Mysql 
{
    //Singleton Implementieren
    //Vermeidet mehrfache Erstellung des selben Objekts. Wenn man zb von anderen projekten was übernimmt mit selben Objekt Namen
    //Hier gewünscht, um nicht mehrere Datenbank Verbindungen (über den Konstruktor) gleichzeitig aufzubauen
    
    private static ?Mysql $instanz = null; // null oder mysql ist drin

    public static function getInstanz(): Mysql //function getInstanz
    {
        if (!self::$instanz) {
            self:: $instanz = new Mysql(); //Neues Objekt Mysql
        }
        return self::$instanz;
    }

    //Singleton Implementierung ENDE


    private \mysqli $db;

    public function __construct() //konstruktor

    {
        $this->verbinden(); 
    }

    public function verbinden() //Verbidung zur Datenbank aufbauen

    {   //Mysqli-Objekt von PHP erstellen und DB Verbindung aufbauen
        $this->db = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORT, MYSQL_DATENBANK);
        //Zeichensatz mitteilen, in dem wir mit der DB sprechen wollen
        $this->db->set_charset("utf8mb4");

        
    }
       
    public function escape(string $wert): string //escapen von injections
    {
         return $this->db->real_escape_string($wert);
    }

    //query function datenbankabfrage
    public function query(string $input): \mysqli_result|bool  //  -> mysqli_result   | (oder)  bool // Query function (Abfrage Datenbank)
    {
        $ergebnis = $this->db->query($input);
        return $ergebnis;
    }
}

