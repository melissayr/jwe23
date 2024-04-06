<?php
spl_autoload_register(
    function (string $klasse) {
        //Projekt-spezifisches namespace prefix
        $prefix = "WIFI\\JWE\\";

        //Basisverzeichnis für das Projekt 
        $basis = __DIR__ . "/";

     
        //Wenn die Klasse das prefix nicht verwendet dann abbrechen
        //Wir sind nicht für das Laden von Dateien anderer Projekte verantwortlich
        $leange = strlen($prefix); //zählt die bustaben von prefix string oben - muss nicht jedes mal neu angepasst werden
        if (substr($klasse, 0, $leange) !== $prefix ) {
            return;
        }

        //Klasse ohne Prefix
        $klasse_ohne_prefix = substr($klasse, $leange);
        

        //Dateipfad erstellen
        $datei =$basis . $klasse_ohne_prefix . ".php"; //Dateipfad für autoloader
        $datei = str_replace("\\", "/", $datei);

        //Wenn die Datei existiert, einbinden
        if (file_exists($datei)) {
            include $datei;

        }
    }
);


use WIFI\JWE\Tier\Hund;
use WIFI\JWE\Tier\Katze;
use WIFI\JWE\Tier\Maus;


$hund = new Hund("Rufus");//neues objekt hund - construktur Rufus übergeben - Das "new" ist der Aufruf für den Konstruktor

echo $hund ->get_name();
echo "<br>";
echo $hund ->gib_laut();
echo "<br>";


$katze = new Katze("Tom");
echo $katze ->get_name();
echo "<br>";
echo $katze ->gib_laut();
echo "<br>";

$maus = new Maus("Jerry");
echo $maus ->get_name();
echo "<br>";
echo $maus ->gib_laut();

