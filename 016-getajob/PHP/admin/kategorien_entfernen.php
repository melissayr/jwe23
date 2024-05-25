
<?php
include "funktionen.php";
ist_eingeloggt();


echo "<h1>Kategorie löschen</h1>";

$sql_id = escape($_GET["id"]);


if(!empty($_GET["doit"])){

    //Bestätigungslink wurde geklickt -> wirklich in DB löschen

    query(" DELETE FROM kategorien WHERE id = '{$sql_id}'" );
    echo "<p>Kategorie wurde erfolgreich entfernt. <a href='kategorien_liste.php'>Zurück zur Kategorieliste</a>";
}

else {
    //Benutzer fragen , ob der Job wirklich entfert werden soll
    $result = query("SELECT * FROM kategorien WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);



    if (!empty ($row)) {
        echo "<p> 
        Sind sie sich sicher, das sie die Kategorie <strong>". htmlspecialchars($row["kategorien"]). "</strong> entfernen möchten?</p>"
        .
        "<p> <a href='kategorien_liste.php'> Nein abbrechen</p></a>" 
        .
        "<p><a href='kategorien_entfernen.php?id={$row['id']}&amp;doit=1'> Ja sicher</p></a>";
        
        } else {
    // Job existiert nicht
        echo "<p> Job existiert nicht (mehr). <a href='kategorien_liste.php'>Zurück zur Kategorien Liste</a></p>";
    }
}

include "../fuss.php";
?>