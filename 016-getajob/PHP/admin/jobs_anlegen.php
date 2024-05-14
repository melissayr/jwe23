<!-- Link zum css -->
<link href="style.css" rel="stylesheet" type="text/css" />
<link
rel="stylesheet"
href="../vendor/bootstrap-5.3.2-dist/css/bootstrap.css"
/>

<?php
// fragen ob eingeloggt nur dann kann man anlegen
include "funktionen.php";
ist_eingeloggt();

$errors = array();

$erfolg = false;


//prüfen ob formular abgeschickt wurde
if (!empty($_POST)) 
{
    $sql_titel = escape( $_POST["titel"]);
    $sql_id = escape( $_POST["id"]);
    $sql_jobs = escape( $_POST["jobs"]);
    $sql_kategorie_id = escape( $_POST["kategorie_id"]);



    //Felder validieren
    if(empty($sql_titel)) {
        $errors[] = "Bitte gebe einen Titel für den Job an";
        } else {

            //überprüfen ob es die zutat bereits gibt
            $result = query("SELECT * FROM jobs WHERE titel = '{$sql_titel}' "); // $db in funktionen 

                    //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn die Zutaten bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Dieses Jobangebot existiert bereits";}
        } 

        if (empty($errors)) {

            if ($sql_id == "") {
                $sql_id = "NULL"; // Wenn eine Zutat keine kcal hat, setze auf NULL
            }

            if ($sql_jobs == "") {
                $sql_jobs = "NULL"; //  setze auf NULL wenn leer
            }



            query("INSERT INTO jobs SET 
            titel = '{$sql_titel}',
            id = {$sql_id},
            jobs = '{$sql_jobs}',
            kategorie_id = '{$sql_kategorie_id}' ") ;

            $erfolg = true;
        }
}

?>


<body>
    <h1>Neuen Job anlegen</h1>

    <?php 
 
    //Schleife für Fehler

    if(!empty($errors)) {
        echo "<strong>Folgender Fehler ist aufgetreten</strong><br>";
        // echo $fehlermeldungen;

        echo "<nav><ul>";
        foreach ($errors as $index => $error) {
            echo "<li>" . $error . "</li>";
            echo "<br/>";
        }
        echo "</ul></nav>";
    }
    if ($erfolg) {
        echo "<p>Job erfolgreich angelegt. <a href='jobs_liste.php'>Zurück zur Jobs Liste</a></p>";
    }




    ?>

    <form action="jobs_anlegen.php" method="post">
        <div>
            <lable for="jobs">Beschreibung:</lable>
            <input type="text" name="titel" id="titel" />
        </div>

        <div>
            <lable for="titel">Titel:</lable>
            <input type="text" name="kcal_pro_100" id="kcal_pro_100" />
        </div>

        <div>
            <lable for="id">ID:</lable>
            <input type="number" name="menge" id="menge" />
        </div>


        <div><button type="submit">Job anlegen</button></div>
    </form>

</body>
