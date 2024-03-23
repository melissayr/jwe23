<?php
include "funktionen.php";
include "kopf.php";



// $sql_flugnr = escape($_GET["flugnr"]);

// $result = query ( "SELECT  rezepte.*, benutzer.benutzername 
// FROM rezepte LEFT JOIN benutzer ON rezepte.benutzer_id = benutzer.id 
// ORDER BY titel ASC");












$result = query ( "SELECT * FROM fluege ORDER BY abflug ASC");





// # Dann speicher den aktuellen Timestamp ein mit 
// $zeit = time(); # Muss natürlich time() und nicht now() heißen ;)
// # Wennn du aus der Datenbank die Zeit holst, konvertier die wie du willst
// $logintime = $row['fluege'];
// $logintime = date("d.m.Y H:s",$logintime);
// echo $result; # Gibt dir das Datum in dem Format aus: 11.11.1111 11:11




echo "<table border='1'>";

echo "<thread>";
echo "<tr>";

    echo "<th>Flugnummer</th>";
    echo "<th>Abflug</th>";
    echo "<th>Ankunft</th>";
    echo "<th>Startflughafen</th>";
    echo "<th>Zielflughafen</th>";
 
echo "</tr>";
echo "</thread>";

    echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr>";
        echo "<td>" . $row["flugnr"]  .  "</td>";
      
        echo "<td>" . $row["abflug"]  .  "</td>";

        echo "<td>" . $row["ankunft"]  .  "</td>";

        echo "<td>" . $row["start_flgh"]  .  "</td>";

        echo "<td>" . $row["ziel_flgh"]  .  "</td>";

  


    echo "</tr>";
}

    echo"</tbody>";
echo"</table>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


?>
    <!-- <h1>Alle Flüge</h1>

    <div class='row font-weight-bold border-bottom text-center'>
      <div class='col-2'>Flugnummer</div>
      <div class='col-3'>Abflug</div>
      <div class='col-3'>Ankunft</div>
      <div class='col-2'>Startflughafen</div>
      <div class='col-2'>Zielflughafen</div>
    </div> -->

    <!-- <div class='row text-center'>
      <div class='col-2'> </div>
      <div class='col-3'></div> <?php  echo $row["abflug"] ?>
      <div class='col-3'><?php echo $row["ankunft"]  ?></div>
      <div class='col-2'><?php  echo $row["start_flgh"]  ?></div>
      <div class='col-2'><?php  echo $row["ziel_flgh"]  ?></div>
    </div> -->
    <!-- <div class='row text-center'>
      <div class='col-2'>AB 456</div>
      <div class='col-3'>25.11.2044, 12:34</div>
      <div class='col-3'>26.11.2045, 11:34</div>
      <div class='col-2'>ABC</div>
      <div class='col-2'>XYZ</div>
    </div>
    <div class='row text-center'>
      <div class='col-2'>AZ 789</div>
      <div class='col-3'>11.02.2033, 05:05</div>
      <div class='col-3'>12.02.2033, 06:06</div>
      <div class='col-2'>OPQ</div>
      <div class='col-2'>RST</div>
    </div> -->
<?php



include "fuss.php";
?>
