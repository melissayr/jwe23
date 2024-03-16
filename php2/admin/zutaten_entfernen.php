<?php 
include "funktionen.php" ;
ist_eingeloggt();

include "kopf.php";

echo "<h1> Zutaten entfernen</h1>";


$sql_id = escape($_GET["id"]);

if(!empty($_GET["doit"])){
    //Bestätigungslink wurde geklickt -> wirklich in DB löschen

    query("DELETE FROM zutaten WHERE id = '{$sql_id}'" );
    echo "<p> Zutat wurde erfolgreich entfernt. <a href='zutaten_liste.php'>Zurück zur Zutaten Liste</a>";
}

else {
    //Benutzer fragen , ob die Zutat wirklich entfert werden soll
    $result = query("SELECT * FROM zutaten WHERE id= '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);


    //Prüfen ob die Zutat in einem Rezept vorkommt

    $result2 = query("SELECT * FROM zutaten_zu_rezepte WHERE zutaten_id= '{$sql_id}'");
    $list_mit_rezept_verknüpft = mysqli_fetch_assoc($result2);


if (empty ($row)) {
    //Zutat existiert nicht 
    echo "<p> Zutat existiert nicht (mehr). <a href='zutaten_liste.php'>Zurück zur Zutaten Liste</a></p>";
    
    } else if ($list_mit_rezept_verknüpft) {
        echo "<p>Die Zutat <strong>" . htmlspecialchars($row["titel"]) . 
        "</strong>  wird noch bei einem Rezept verwendet und kann daher nicht entfernt werden.</p>";
        echo "<p><a href='zutaten_liste.php'</a>Zurück zur Liste</p>";
    

    } else {
        echo "<p> 
        Sind sie sich sicher, das sie die Zutat <strong>". htmlspecialchars($row["titel"]). "</strong> entfernen möchten?</p>";
        
        echo "<p> <a href='zutaten_liste.php'> Nein abbrechen</p></a>" 
        .
        "<p><a href='zutaten_entfernen.php?id={$row['id']}&amp;doit=1'> Ja sicher</p></a>";
    }
}








include "fuss.php";



?>