
<?php include "funktionen.php";
include "admin/aktualisiere_jobs.php";
?>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Javascript -->
<!-- <script src="../016-getajob/getajob.js"></script> PFAD PASST NICHT DESHALB JS AUF DER SEITE UNTEN -->

    <!-- Hier werden Jobs selektiert  -->
    <h2 class="page-heading">Jobs</h2>

    <div id="searching">
      <h3>Selektiere die Stellenanzeigen:</h3>
      <input id="jobSearchInput"  placeholder="Drücke Enter zum suchen ..." type="text" name="text" class="input">
    </div>


<!-- Hier werden die Jobs angezeigt -->

<?php
//Ausbau Schritt QUERY FUNKTION FÜR KÜRZEREN CODE statt "$result =  mysqli_query ($db ... )"
$result = query( "SELECT * FROM jobs WHERE id ORDER BY id ASC");

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

while ($row = mysqli_fetch_assoc($result)) {
// print_r($row);
// die;
    echo "<tr  style='border-bottom: 1px solid black;'>";
        echo "<td>" . $row["id"]  .  "</td>";
      
        echo "<td>" . $row["jobs"]  .  "</td>";

        echo "<td>" . $row["titel"]  .  "</td>";

        echo "<td>" . $row["qualifikation"]  .  "</td>";

        echo "<td>" . $row["dienstort"]  .  "</td>";

        echo "<td>" . $row["stundenausmaß"]  .  "</td>";

        echo "<td>" . $row["mindestgehalt_euro"]  .  "</td>";

        echo "<td>" . $row["kategorie_id"]  .  "</td>";


    echo "</tr>";
}

    echo"</tbody>";
    echo"</table>";
    
    echo "<br/>";


?>



<script>
                    $(document).ready(function() {
  $("#jobSearchInput").on("keyup", function() {
    const input = $(this).val().toUpperCase();
    const table = $("#myTable");
    const tr = table.find("tr");
// durchsuch meinen table um Jobs zu filtern
    tr.each(function() {
      const td = $(this).find("td");
      if (td.length > 0) {
        const jobDescription = td.eq(1).text().toUpperCase();
        const jobTitle = td.eq(2).text().toUpperCase();
        const qualifikation = td.eq(3).text().toUpperCase();
        const dienstort = td.eq(4).text().toUpperCase();
        const stundenausmaß = td.eq(5).text().toUpperCase();
        const mindestgehalt = td.eq(6).text().toUpperCase();
        const suchBegriffe = jobDescription + jobTitle + qualifikation + dienstort + stundenausmaß + mindestgehalt;


        if (suchBegriffe.indexOf(input) > -1) {
          $(this).show(); //zeigt das gesuchte an
        } else {
          $(this).hide(); //versteckt, wenn das suchergebnis nicht zutrifft
        }
      }
    });
 });
});


</script>
</main>




       <!-- <p> Liste der Kategorien
              <ul>
                  <li> Bau, Architektur, Vermessung</li>
                  <li>Dienstleistung</li>
                  <li>Elektro</li>
                  <li>Gesundheit</li>
                  <li>IT, Computer</li>
                  <li>Kunst, Kultur, Gestaltung</li>
                  <li>Landwirtschaft, Natur, Umwelt</li>
                  <li>Medien</li>
                  <li>Metall, Maschinenbau</li>
                  <li>Naturwissenschaften</li>
                  <li>Produktion, Fertigung</li>
                  <li>Soziales, Pädagogik</li>
                  <li>Technik, Technologiefelder</li>
                  <li>Verkehr, Logistik</li>
                  <li>Wirtschaft, Verwaltung</li>
         
          
        </ul>
        </p>  -->