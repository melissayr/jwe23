<?php
include "Kreis.php";

$k = new Kreis (3);

echo "Flaeche: " . $k->flaeche();
echo"<br>";

echo "Durchmesser: " . $k->durchmesser(); // 2*r
echo"<br>";

echo "Umfang: " . $k->umfang(); // 2*r*PI
echo"<br>";

$k->set_radius(5);
echo "Durchmesser NEU: " .  $k->durchmesser();
echo"<br>";

$benutzer_eingabe = 2;

//Wird in einem try-Block eine Exception geworfen, hat man mit "catch" die Möglichkeit darauf zu reagieren
try{
    $k ->set_radius($benutzer_eingabe);
    echo "Durchmesser zum Schluss " . $k->durchmesser();
    echo"<br>";

} catch (Exception $ex) {
    //Fängt alle Exception-Objekte ab, die im try-Block gewrofen werden, throw new Exception ("..")
    echo "Da war was falsch: " . $ex->getMessage();
    echo"<br>";

} finally {  // Dieser code wird in jedem Fall ausgeführt
    echo "Das wars wohl. <br>";
}

unset($k);

echo "Letzte Ausgabe<br>"; 