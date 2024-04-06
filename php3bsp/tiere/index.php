<?php
spl_autoload_register(
    function (string $klasse) {
        //Projekt-spezifisches namespace prefix
        $prefix = "WIFI\\JWE\\";

        //Basisverzeichnis für das Projekt 
        $basis = __DIR__ . "/";

        
  
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

