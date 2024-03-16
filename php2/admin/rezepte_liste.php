<?php

include "funktionen.php";

ist_eingeloggt();

include "kopf.php";

?>

<h1>Rezepte</h1>


<?php
//Ausbau Schritt mir ORDER BY // QUERY FUNKTION FÜR KÜRZEREN CODE statt "$result =  mysqli_query ($db ... )"
$result = query ( "SELECT * FROM rezepte ORDER BY titel ASC");



echo "<table border='1'>";

echo "<thread>";
echo "<tr>";

    echo "<th>Titel</th>";
    echo "<th>Menge</th>";
    echo "<th>Einheit</th>";
    echo "<th>Kalorien</th>";
    echo "<th>Aktionen</th>";
 
echo "</tr>";
echo "</thread>";

    echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr>";
        echo "<td>" . $row["titel"]  .  "</td>";
      
        echo "<td>" . $row["beschreibung"]  .  "</td>";

        echo "<td>" . $row["benutzer_id"]  .  "</td>";

   

        echo "<td>" . "<a href='zutaten_bearbeiten.php?id={$row["id"]}'>Bearbeiten</a>"  .  "</td>";

        echo "<td>" . "<a href='zutaten_entfernen.php?id={$row["id"]}'>Entfernen</a>"  .  "</td>";



    echo "</tr>";
}

    echo"</tbody>";
echo"</table>";



?>

<?php

include "fuss.php";

?>