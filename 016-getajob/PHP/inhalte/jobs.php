<main>

    <h2 class="page-heading">Jobs</h2>


    <!-- Hier werden Jobs selektiert  -->

    <div id="searching">

      <h3>Selektiere die Stellenanzeigen:</h3>


      <input placeholder="Drücke Enter zum suchen ... " type="text" name="text" class="input" >
      <!-- <form>
          <button title="Suche starten"><i class="fa fa-search"></i></button>
      </form> -->
     
      </div> 


      <?php

include "funktionen.php";

// ist_eingeloggt();

// include "kopf.php";

?>

<p><a href="jobs_anlegen.php">Neue Jobs anlegen</a></p>


<?php
//Ausbau Schritt mir ORDER BY // QUERY FUNKTION FÜR KÜRZEREN CODE statt "$result =  mysqli_query ($db ... )"
$result = query( "SELECT * FROM jobs WHERE id ORDER BY id ASC");



echo "<table border='1'>";

echo "<thread>";
echo "<tr>";

    echo "<th>&nbsp;ID</th>";
    echo "<th>&nbsp;Job-Beschreibung</th>";
    echo "<th>&nbsp;Titel</th>";
    echo "<th>&nbsp;Aktionen</th>";
 
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

?>

</main>

<!-- 
      <div class="card">


        <div class="card-description">
         
            <h3>The Blog Title Here</h3>
          </a>
     
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, ullam facilis consequuntur eligendi sit accusamus tempora
            cum distinctio pariatur ipsa quod, odit dolorum non vero recusandae? Corporis voluptatem optio nulla.
          </p>
          <a href="#" class="btn-readmore">Read more</a>
        </div>
      </div> -->




       <!-- <p>
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