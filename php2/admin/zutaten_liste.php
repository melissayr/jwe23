<?php

include "funktionen.php";

ist_eingeloggt();

include "kopf.php";

?>

<h1>Zutaten</h1>
<p><a href="zutaten_neu.php">Neue Zutat anlegen</a></p>

<?php
//Ausbau Schritt mir ORDER BY // QUERY FUNKTION FÜR KÜRZEREN CODE statt "$result =  mysqli_query ($db ... )"
$result = query ( "SELECT * FROM zutaten ORDER BY titel ASC");

// print_r($result);

echo "<table border='1'>";

echo "<thread>";
echo "<tr>";

    echo "<th>Titel</th>";
    echo "<th>Menge</th>";
    echo "<th>Kalorien</th>";
 
echo "</tr>";
echo "</thread>";

    echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr>";
        echo "<td>" . $row["titel"]  .  "</td>";
      
        echo "<td>" . $row["menge"]  .  "</td>";

        echo "<td>" . $row["kcal_pro_100"]  .  "</td>";

    echo "</tr>";
}

    echo"</tbody>";
echo"</table>";



?>

<?php

include "fuss.php";

?>