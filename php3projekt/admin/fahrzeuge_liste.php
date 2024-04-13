<?php

include "setup.php";
ist_eingeloggt();



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
    echo"<thead>";


    $fahrzeuge = new Fahzeuge(); //ACHTUNG MEHRZAHL ANDERES OBJEKT
    $alle_fahrzeuge = $fahrzeuge->alle_fahrzeuge(); //gibt "Fahrzeuge" Objekte als array zurück

    echo "<pre>";
    print_r($alle_fahrzeuge);













include "fuss.php";