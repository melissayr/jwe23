<!-- Link zum css -->
<link rel="stylesheet" href="style.css">
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
if (!empty($_POST)) {
    //erstmal alles escapen um SQL injections zu vermeiden

    $sql_id = escape( $_POST["id"]);
    $sql_kategorien = escape( $_POST["kategorien"]);



    //Felder validieren
    if(empty($sql_kategorien)) {
        $errors[] = "Bitte gebe einen Titel für die Kategorie an";
        } else {

            //überprüfen ob es die zutat bereits gibt
            $result = query("SELECT * FROM kategorien WHERE id = '{$sql_id}' "); // $db in funktionen 

                    //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn die Zutaten bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Diese Kategorie existiert bereits";}
        } 

        if (empty($errors)) {

            if ($sql_kategorie == "") {
                $sql_kategorie_id == "NULL"; // Wenn job keine kategorie id hat, setze auf NULL
            }


            //anlegen in Datenbank
            query(" INSERT INTO kategorien SET 
            kategorien = '{$sql_kategorien}',
            id = '{$sql_id}'
             ") ;

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
        echo "<p style='color:green'>Kategorie erfolgreich angelegt. <a href='kategorien_liste.php'>Zurück zur Jobs Liste</a></p>";
    }

?>

    <form action="kategorien_anlegen.php" method="post">
        <div>
            <lable for="kategorien">Kategorie:</lable>
            <input type="text" name="kategorien" id="kategorien" />
        </div>

        

        <div><button type="submit">Kategorie anlegen</button></div>
    </form>

    <a href='kategorien_liste.php'>Zurück zur Kategorien Liste</a>
</body>

<?php
include "../fuss.php";
?>