<?php

include "setup.php";

ist_eingeloggt();

include "kopf.php";

?>

<h1>Jobs Liste</h1>

<?php

    echo "<p><a href='anlegen.php'>Neuen Job hinzufügen</a></p>";
    echo "<table border='1'>";

    echo "<thread>";
    echo "<tr>";
    echo "<th>ID &nbsp;</th>";
    echo "<th>Beschreibung &nbsp;</th>";
    echo "<th>Titel&nbsp;</th>";
    echo "<th>Kategorie ID &nbsp;</th>";
    echo "<th>Qualifikation&nbsp;</th>";
    echo "<th>Dienstort&nbsp;</th>";
    echo "<th>Stundenausmaß&nbsp;</th>";
    echo "<th>Mindestgehalt_euro&nbsp;</th>";
    echo "<th>Aktionen&nbsp;</th>";
    echo "</tr>";
    echo "</thread>";
    echo "<tbody>";

    // Neues Jobs Objekt
    $jobs = new Jobs();


    // Die einzelnen Jobs ausgeben
    foreach ($all_jobs as $job) {
        echo "<tr>";

            // Magic Method für jedes Job Objekt und die einzelne Eigenschaft ausgeben
            echo "<td>" . $job->beschreibung . "</td>";
            echo "<td>" . $job->titel . "</td>";
            echo "<td>" . $job->kategorie_id()->kategorie . "</td>";
            echo "<td>" . $job->qualifikation . "</td>";
            echo "<td>" . $job->dienstort . "</td>";
            echo "<td>" . $job->stundenausmaß . "</td>";
            echo "<td>" . $job->mindestgehalt_euro . "</td>";


            echo "<td>"."<a href='bearbeiten.php?id={$job->id}'>Bearbeiten</a>"."</td>";
            echo "<td>"."<a href='entfernen.php?id={$job->id}'>Entfernen</a>"."</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

?>

<?php

include "fuss.php";

?>