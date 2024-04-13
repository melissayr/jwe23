<?php

include "setup.php";
ist_eingeloggt();

use WIFI\Php3\Fdb_Klassen\Validieren; //Error class not found ->use !
use WIFI\Php3\Fdb_Klassen\Model\Row\Fahrzeug;

$erfolg = false;

//wurde es abgeschickt
if (!empty($_POST)) {
    //validieren
    $validieren = new Validieren();                     //Validierungs Text "Kennzeichen" war leer.
    if ($validieren->ist_ausgefuellt($_POST["kennzeichen"], "Kennzeichen")) {
        $validieren->ist_kennzeichen($_POST["kennzeichen"], "Kennzeichen");
    }

    $validieren->ist_ausgefuellt($_POST["marken_id"], "Marke");

    $validieren->ist_ausgefuellt($_POST["farbe"], "Farbe");

   if ( $validieren->ist_ausgefuellt($_POST["baujahr"], "Baujahr")) {
        $validieren->ist_jahr($_POST["baujahr"], "Baujahr");
   }


   // wenn keine Fehler aufgetreten sind
   if (!$validieren->fehler_aufgetreten()) {
        //speichern 
        $fahrzeug = new Fahrzeug(array(
            "kennzeichen" => $_POST["kennzeichen"],
            "marken_id" => $_POST["marken_id"],
            "farbe" => $_POST["farbe"],
            "baujahr"=>$_POST["baujahr"]
        ));
        $fahrzeug->speichern();
        $erfolg = true;
   }


}

include "kopf.php";

echo "<h1>Fahrzeuge anlegen/bearbeiten</h1>";

if($erfolg) {
    echo "<p>Fahrzeug wurde gespeichert <br>
    <a href='fahrzeuge_liste.php'>Zurück zur Liste</a></p>";
}

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
            <option value="1">- Option 1 -</option>
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