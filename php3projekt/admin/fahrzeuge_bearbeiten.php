<?php

include "setup.php";
ist_eingeloggt();

use WIFI\Php3\Fdb_Klassen\Validieren; //Error class not found ->use !

//wurde es abgeschickt
if (!empty($_POST)) {
    //validieren
    $validieren = new Validieren();                     //Validierungs Text "Kennzeichen" war leer.
    if ($validieren->ist_ausgefuellt($_POST["kennzeichen"], "Kennzeichen")) {
        $validieren->ist_kennzeichen($_POST["kennzeichen"], "Kennzeichen");
    }
    $validieren->ist_ausgefuellt($_POST["marken_id"], "Marke");
    $validieren->ist_ausgefuellt($_POST["farbe"], "Farbe");
    $validieren->ist_ausgefuellt($_POST["baujahr"], "Baujahr");
}

include "kopf.php";

echo "<h1>Fahrzeuge anlegen/bearbeiten</h1>";

if(!empty($validieren)){
    echo $validieren->fehler_html();
}
?>


<form method="post" action="fahrzeuge_bearbeiten.php">
    <div>
        <label for="kennzeichen">kennzeichen</label>
        <input type="text" name="kennzeichen" id="kennzeichen" placeholder="SL-123AB">
    </div>

    <div>
        <label for="marken_id">Marke:</label>

        <select name="marken_id" id="marken_id">
            <option value="">- Bitte wählen -</option>
            <option value="">- Option 1 -</option>
        </select>
    </div>

    <div>
        <label for="farbe">Farbe</label>
        <input type="text" name="farbe" id="farbe" placeholder="blau">
    </div>

    <div>
        <label for="baujahr">Baujahr</label>
        <input type="text" name="baujahr" id="baujahr" placeholder="1999">
    </div>


    <div>
        <button type="submit">Fahrzeug speichern</button>
    </div>



</form>



















<?php

include "fuss.php";