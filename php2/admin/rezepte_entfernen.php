<?php 
include "funktionen.php" ;
ist_eingeloggt();

include "kopf.php";

echo "<h1> Rezept entfernen</h1>";


$sql_id = escape($_GET["id"]);

if(!empty($_GET["doit"])){
    //Bestätigungslink wurde geklickt -> wirklich in DB löschen

    query("DELETE FROM rezepte WHERE id = '{$sql_id}'" );
    echo "<p> Rezept wurde erfolgreich entfernt. <a href='rezepte_liste.php'>Zurück zur Rezepte Liste</a>";
}

else {
    //Benutzer fragen , ob die Zutat wirklich entfert werden soll
    $result = query("SELECT * FROM rezepte WHERE id= '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);



if (empty ($row)) {
    //Zutat existiert nicht 
    echo "<p>Das Rezept existiert nicht (mehr). <a href='rezepte_liste.php'>Zurück zur Rezepte Liste</a></p>";
    

    } else {
        echo "<p> 
        Sind sie sich sicher, das sie die das Rezept <strong>". htmlspecialchars($row["titel"]). "</strong> entfernen möchten?</p>";
        
        echo "<p> <a href='rezepte_liste.php'> Nein abbrechen</p></a>" 
        .
        "<p><a href='rezepte_entfernen.php?id={$row['id']}&amp;doit=1'> Ja sicher</p></a>";
    }
}








include "fuss.php";



?>