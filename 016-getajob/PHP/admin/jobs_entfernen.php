
<?php
include "funktionen.php";
ist_eingeloggt();


echo "<h1> Job löschen</h1>";

$sql_id = escape($_GET["id"]);


if(!empty($_GET["doit"])){

    //Bestätigungslink wurde geklickt -> wirklich in DB löschen

    query(" DELETE FROM jobs WHERE id = '{$sql_id}'" );
    echo "<p> Job wurde erfolgreich entfernt. <a href='jobs_liste.php'>Zurück zur Jobliste</a>";
}

else {
    //Benutzer fragen , ob der Job wirklich entfert werden soll
    $result = query("SELECT * FROM jobs WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);



    if (!empty ($row)) {
        echo "<p> 
        Sind sie sich sicher, das sie den Job <strong>". htmlspecialchars($row["titel"]). "</strong> entfernen möchten?</p>"
        .
        "<p> <a href='jobs_liste.php'> Nein abbrechen</p></a>" 
        .
        "<p><a href='jobs_entfernen.php?id={$row['id']}&amp;doit=1'> Ja sicher</p></a>";
        
        } else {
    // Job existiert nicht
        echo "<p> Job existiert nicht (mehr). <a href='jobs_liste.php'>Zurück zur Job Liste</a></p>";
    }
}

include "../fuss.php";
?>