<?php include "admin/funktionen.php"; ?>

    <title>Job Verwaltung</title>
    <!-- jQuery-Bibliothek -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2 class="page-heading">Jobs</h2>
    <h4>Kategorien ID´s</h4>
    <p>1 Bau, Architektur, Vermessung <br> 2 Dienstleistung<br> 3 Soziales<br> 4 IT, Computer<br> 5 Gesundheit</p>

    <div id="searching">
        <h3>Selektiere die Stellenanzeigen:</h3>
        <input id="jobSearchInput" placeholder="Drücke Enter zum suchen ..." type="text" name="text" class="input">
    </div>

    <!-- Hier werden die Jobs angezeigt -->
    <?php
  
    // Abfrage aus der Datenbank
    $result = query("SELECT * FROM jobs ORDER BY id ASC");

    echo "<table id='myTable' border='1'>";
    echo "<thead style='border-bottom: 1px solid black;'>";
    echo "<tr style='border-bottom: 1px solid black;'>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='border-bottom: 1px solid black;'>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["jobs"] . "</td>";
        echo "<td>" . $row["titel"] . "</td>";
        echo "<td>" . $row["qualifikation"] . "</td>";
        echo "<td>" . $row["dienstort"] . "</td>";
        echo "<td>" . $row["stundenausmaß"] . "</td>";
        echo "<td>" . $row["mindestgehalt_euro"] . "</td>";
        echo "<td>" . $row["kategorie_id"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
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

    // AJAX für automatische aktualisierung
        $(document).ready(function() {
            function ladeJobs() {
                $.ajax({
                    url: 'http://localhost/workspaces/jwe23/016-getajob/PHP/inhalte/aktualisiere_jobs.php',
                    type: 'GET',
                    success: function(response) {
                        console.log("AJAX Anfrage erfolgreich");
                        $('#myTable tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Fehler bei der AJAX-Anfrage:", status, error);
                    }
                });
            }

            ladeJobs();
            setInterval(ladeJobs, 5000);
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