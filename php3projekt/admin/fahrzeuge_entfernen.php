<?php 
include "setup.php" ;
ist_eingeloggt();

use WIFI\Php3\Fdb_Klassen\Model\Row\Fahrzeug;

include "kopf.php";

echo "<h1>Fahrzeug entfernen</h1>";

$fahrzeug = new Fahrzeug ($_GET["id"]);


if(!empty($_GET["doit"])){
    //Bestätigungslink wurde geklickt -> wirklich in DB löschen

    $fahrzeug->entfernen();

    echo "<p> Fahrzeug wurde erfolgreich entfernt. <a href='fahrzeuge_liste.php'>Zurück zur Fahrzeuge Liste</a>";

} else {
        echo "<p> Sind sie sich sicher, das sie die das Fahrzeug entfernen möchten?</p>";

        echo "Kennzeichen: " . $fahrzeug->kennzeichen . "<br>";
 
        echo "Marke: " . $fahrzeug->get_marke()->hersteller . "<br>";

        echo "Farbe: " . $fahrzeug->farbe . "<br>";
        
        echo "Baujahr: " . $fahrzeug->baujahr . "<br>";

        
        echo "<p> <a href='fahrzeuge_liste.php'> Nein abbrechen</p></a>" 
        .
        "<p><a href='fahrzeuge_entfernen.php?id={$fahrzeug->id}&amp;doit=1'> Ja sicher</p></a>";
    }


include "fuss.php";

?>