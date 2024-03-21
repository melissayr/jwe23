<?php

include "funktionen.php";

ist_eingeloggt();

include "head.php";

?>

<h1>MUSIK</h1>
<p><a href="musik_neu.php">Neue Musik anlegen</a></p>


<?php
$result = query ( "SELECT * FROM musik ORDER BY Titel ASC");

// print_r($result);


echo "<table border='1'>";

echo "<thread>";
echo "<tr>";

    echo "<th>Titel</th>";
    echo "<th>Künstler</th>";
    echo "<th>Jahr</th>";
 
echo "</tr>";
echo "</thread>";

// ___________________________________

echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr>";
        echo "<td>" . $row["Titel"]  .  "</td>";
      
        echo "<td>" . $row["Künstler"]  .  "</td>";

        echo "<td>" . $row["Jahr"]  .  "</td>";

        echo "<td>" . "<a href='zutaten_bearbeiten.php?id={$row["id"]}'>Bearbeiten</a>"  .  "</td>";

        echo "<td>" . "<a href='zutaten_entfernen.php?id={$row["id"]}'>Entfernen</a>"  .  "</td>";



    echo "</tr>";
}

    echo"</tbody>";




include "footer.php";

?>