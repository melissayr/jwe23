<?php

include "setup.php";
ist_eingeloggt();

use WIFI\Php3\Fdb_Klassen\Model\Fahrzeuge;


include "kopf.php";

echo "<h1>Fahrzeuge</h1>";

echo "<p> <a href='fahrzeuge_bearbeiten.php'>Neues Fahrzeug anlegen";



echo "<table border='1'>";
    echo"<thead>";   
        echo "<tr>";
            echo"<th>Kennzeichen</th>";
            echo"<th>Marke</th>";
            echo"<th>Farbe</th>";
            echo"<th>Baujahr</th>";
        echo"</tr>";
    echo"</thead>";

    echo "<tbody>";


    $fahrzeuge = new Fahrzeuge(); //ACHTUNG MEHRZAHL ANDERES OBJEKT
    $alle_fahrzeuge = $fahrzeuge->alle_fahrzeuge(); //gibt "Fahrzeuge" Objekte als array zurück

    foreach ($alle_fahrzeuge as $auto) {
        echo "<tr>";

            echo "<td>" . $auto->kennzeichen . "</td>";
            echo "<td>" . $auto->get_marke()->hersteller . "</td>";
            echo "<td>" . $auto->farbe . "</td>";
            echo "<td>" . $auto->baujahr . "</td>";
            echo "<td>"
            . "<a href='fahrzeuge_bearbeiten.php?id={$auto->id}'>Bearbeiten</a> "
            . "<a href='fahrzeuge_entfernen.php?id={$auto->id}'>Entfernen</a>";

            echo "</td>" ;
        echo"</tr>";
    }

    echo "</tbody>";
    echo "</table>";

include "fuss.php";