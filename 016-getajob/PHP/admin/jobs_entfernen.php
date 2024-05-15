<?php
include "funktionen.php";
ist_eingeloggt();


echo "<h1> Job löschen</h1>";
  

if(!empty($_GET["doit"])){



$sql_id = escape($_POST["id"]);
$sql_titel = escape($_POST["titel"]);
$sql_jobs = escape( $_POST["jobs"]);
$sql_kategorie_id = escape( $_POST["kategorie_id"]);

    //Bestätigungslink wurde geklickt -> wirklich in DB löschen

    query(" DELETE FROM jobs WHERE id = '{$sql_id}'" );
    echo "<p> Job wurde erfolgreich entfernt. <a href='jobs_liste.php'>Zurück zur Jobliste</a>";
}

else {
    //Benutzer fragen , ob der Job wirklich entfert werden soll
    $result = query("SELECT * FROM jobs WHERE id= '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);



if (empty ($row)) {
    // echo "<p> 
    // Sind sie sich sicher, das sie den Job <strong>". htmlspecialchars($row["titel"]). "</strong> entfernen möchten?</p>";
    
    //     } else {
    //Job existiert nicht
    echo "<p> Job existiert nicht (mehr). <a href='jobs_liste.php'>Zurück zur Job Liste</a></p>";
    }
}

include "../fuss.php";


?>