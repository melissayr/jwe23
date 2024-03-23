<?php
include "kopf.php";
include "funktionen.php";

echo "<h1> Passagier löschen</h1>";

// $sql_id = escape($_GET["id"]);
  

if(!empty($_GET["doit"])){




$sql_id = escape($_POST["id"]);
$sql_vorname = escape( $_POST["vorname"]);
$sql_nachname = escape( $_POST["nachname"]);
$sql_geburtstag = escape( $_POST["geburtstag"]);

    //Bestätigungslink wurde geklickt -> wirklich in DB löschen

    query("DELETE FROM passagiere WHERE id = '{$sql_id}'" );
    echo "<p> Passagier wurde erfolgreich entfernt. <a href='passagier_liste.php'>Zurück zur Passagierliste</a>";
}

else {


if (empty ($row)) {
    //Zutat existiert nicht 
    echo "<p> Passagier existiert nicht (mehr). <a href='passagier_liste.php'>Zurück zur Passagier Liste</a></p>";

}

}


include "fuss.php";



?>