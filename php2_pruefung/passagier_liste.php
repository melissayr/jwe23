
<?php
include "kopf.php";
include "funktionen.php";
?>

<h1>Passagiere</h1>


<?php
//Ausbau Schritt mir ORDER BY // QUERY FUNKTION FÜR KÜRZEREN CODE statt "$result =  mysqli_query ($db ... )"
$result = query( "SELECT * FROM passagiere ORDER BY nachname ASC");

// print_r($result);

echo "<table border='1'>";

echo "<thread>";
echo "<tr>";

    echo "<th>Vorname</th>";
    echo "<th>Nachname</th>";
    echo "<th>Geburtsdatum</th>";
    echo "<th>Flugangst</th>";
    echo "<th>Entfernen</th>"; 
    echo "<th>Bearbeiten</th>"; 
  
 
echo "</tr>";
echo "</thread>";

    echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr>";
        echo "<td>" . $row["vorname"]  .  "</td>";
      
        echo "<td>" . $row["nachname"]  .  "</td>";

        echo "<td>" . $row["geburtstag"]  .  "</td>";

        echo "<td>" . $row["flugangst"]  .  "</td>";

        echo "<td>" . "<a href='passagier_entfernen.php?id={$row["id"]}'>Entfernen</a>"  .  "</td>";

        echo "<td>" . "<a href='passagier_bearbeiten.php?id={$row["id"]}'>Bearbeiten</a>"  .  "</td>";



    echo "</tr>";
}

    echo"</tbody>";
echo"</table>";



?>



<?php

include "fuss.php";

?>