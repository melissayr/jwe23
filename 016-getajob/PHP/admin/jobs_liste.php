<!-- Link zum css -->
<link href="style.css" rel="stylesheet" type="text/css" />
<link
rel="stylesheet"
href="../vendor/bootstrap-5.3.2-dist/css/bootstrap.css"
/>

<!-- <h1>Verwaltung der Jobs im geheimen Admin Bereich</h1> -->
<?php
include "funktionen.php";

ist_eingeloggt();



?>

<h1>Jobs Verwalten im geheimen Admin Bereich</h1>

<p><a href="jobs_anlegen.php">Neue Jobs anlegen</a></p>


<?php
echo "<br/>";

//Ausbau Schritt mir ORDER BY // QUERY FUNKTION FÜR KÜRZEREN CODE statt "$result =  mysqli_query ($db ... )"
$result = query ( "SELECT * FROM jobs ORDER BY id ASC");



echo "<table border='1'>";

echo "<thread>";
echo "<tr>";

    echo "<th>ID &nbsp;</th>";
    echo "<th>Beschreibung &nbsp;&nbsp;</th>";
    echo "<th>Titel &nbsp;&nbsp;</th>";
    echo "<th>Aktionen &nbsp;&nbsp;</th>";
 
echo "</tr>";
echo "</thread>";

    echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {
// print_r($row);
// die;
    echo "<tr>";
        echo "<td>" . $row["id"]  .  "</td>";
      
        echo "<td>" . $row["jobs"]  .  "</td>";

        echo "<td>" . $row["titel"]  .  "</td>";

   

        echo "<td>" . "<a href='jobs_bearbeiten.php?id={$row["id"]}'>Bearbeiten</a>"  .  "</td>";

        echo "<td>" . "<a href='jobs_entfernen.php?id={$row["id"]}'>Entfernen</a>"  .  "</td>";



    echo "</tr>";
}

    echo"</tbody>";
echo"</table>";


echo "<br/>";
?>


<p><a class="link-danger" href="logout.php">Hier loggst du dich aus!</a></p>

