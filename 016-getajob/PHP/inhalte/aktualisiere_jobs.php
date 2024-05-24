<!-- jQuery-Bibliothek -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php // DB CONN UND QUERY EINGEFÜGT, WEIL PATH NICHT STIMMTE
session_start(); // für die $SESSION 
$db = mysqli_connect("localhost", "root", "", "getajob"); //Verbindung Datenbank
mysqli_set_charset($db, "utf8"); //alle Befehle kommen als uft8

//function für die query 
function query ($sql_befehl) { 
    global $db; //keyword global um die $db Variable vom globalen scope zu übernehmen
    $result = mysqli_query($db, $sql_befehl);

    return $result;
}


// Abfrage aus der Datenbank
$result = query("SELECT * FROM jobs ORDER BY id ASC");

echo "<table id='myTable' border='1'>";
echo "<thead style='border-bottom: 1px solid black;'>";
echo "<tr style='border-bottom: 1px solid black;'>";
echo "<th>&nbsp;ID</th>";
echo "<th>&nbsp;Job-Beschreibung</th>";
echo "<th>&nbsp;Titel</th>";
echo "<th>&nbsp;Qualifikation</th>";
echo "<th>&nbsp;Dienstort</th>";
echo "<th>&nbsp;Stundenausmaß</th>";
echo "<th>&nbsp;Mindestgehalt_euro</th>";
echo "<th>Kategorie&nbsp;</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Generiere die HTML-Zeilen für die Tabelle
$output = "";
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<tr style='border-bottom: 1px solid black;'>";
    $output .= "<td>" . $row["id"] . "</td>";
    $output .= "<td>" . $row["jobs"] . "</td>";
    $output .= "<td>" . $row["titel"] . "</td>";
    $output .= "<td>" . $row["qualifikation"] . "</td>";
    $output .= "<td>" . $row["dienstort"] . "</td>";
    $output .= "<td>" . $row["stundenausmaß"] . "</td>";
    $output .= "<td>" . $row["mindestgehalt_euro"] . "</td>";
    $output .= "<td>" . $row["kategorie_id"] . "</td>";
    $output .= "</tr>";
}


echo $output;

echo "</tbody>";
echo "</table>";




