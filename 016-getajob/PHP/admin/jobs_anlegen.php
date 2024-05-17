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
            $result = query("SELECT * FROM jobs WHERE id = '{$sql_id}' "); // $db in funktionen 

                    //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn die Zutaten bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Dieses Jobangebot existiert bereits";}
        } 

        if (empty($errors)) {

            if ($sql_kategorie_id == "") {
                $sql_kategorie_id == "NULL"; // Wenn job keine kategorie id hat, setze auf NULL
            }




            query(" INSERT INTO jobs SET 
            titel = '{$sql_titel}',
            id = '{$sql_id}',
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
        echo "<p style='color:green'>Job erfolgreich angelegt. <a href='jobs_liste.php'>Zurück zur Jobs Liste</a></p>";
    }




    ?>

    <form action="jobs_anlegen.php" method="post">
        <div>
            <lable for="jobs">Beschreibung:</lable>
            <input type="text" name="jobs" id="jobs" />
        </div>

        <div>
            <lable for="titel">Titel:</lable>
            <input type="text" name="titel" id="titel" />
        </div>

        <div>
        <label for="kategorie_id">Kategorie:</label>
        <input type="number" name="kategorie_id" id="kategorie_id" />
        </div>

        <div>
            <lable for="qualifikation">Qualifikation:</lable>
            <input type="text" name="qualifikation" id="qualifikation" />
        </div>

        <div>
            <lable for="dienstort">Dienstort:</lable>
            <input type="text" name="dienstort" id="dienstort" />
        </div>

        <div>
            <lable for="stundenausmaß">Stundenausmaß:</lable>
            <input type="number" name="stundenausmaß" id="stundenausmaß" />
        </div>

        <div>
            <lable for="mindestgehalt_euro">Mindestgehalt_euro:</lable>
            <input type="number" name="mindestgehalt_euro" id="mindestgehalt_euro" />
        </div>



        <div><button type="submit">Job anlegen</button></div>
    </form>

</body>

<?php
include "../fuss.php";
?>