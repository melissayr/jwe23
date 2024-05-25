<!-- Link zum css -->
<link rel="stylesheet" href="style.css">
<link
rel="stylesheet"
href="../vendor/bootstrap-5.3.2-dist/css/bootstrap.css"
/>

<?php
include "funktionen.php";
ist_eingeloggt();

$erfolg = false;

$sql_id = escape($_GET["id"]);

//wurde das formular abeschickt
if (!empty($_POST)){
    //erstmal alles escapen um SQL Injection zu vermeiden! 
    $sql_kategorien = escape($_POST["kategorien"]);

  
    //Validierung der Felder
    if(empty($sql_kategorien)) {
        $errors[] = "Bitte gebe einen Titel für die Kategorie an";
        } else {
            //Überprüfe ob ein Beruf mit dem  selben Titel bereits existiert
            $result = query("SELECT * FROM kategorien WHERE kategorien = '{$sql_kategorien}' AND id != '{$sql_id}' ");  

            //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn der Job bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Diese Kategorie existiert bereits";


          } 
        }

            //Wenn keine Fehler existieren, dann können wir den Job in der db aktualisieren
            if (empty($errors)) {

                if ($sql_kategorien == "") {
                    $sql_kategorien == "NULL"; // Wenn Titel leer dann null
                }

            //update in Datenbank

            query(" UPDATE kategorien SET
            kategorien = '{$sql_kategorien}'
           
            WHERE id='{$sql_id}' ") ;

            $erfolg = true;
        }
    }

?>
<h1>Kategorien Bearbeiten</h1>
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

    //Erfolgsmeldung
    if ($erfolg) {
        echo "<p style='color:green'>Kategorie erfolgreich bearbeitet!</p> - <a href='kategorien_liste.php'>Zurück zur Liste</a></p>";
    }
    


    // <!-- Datenbank fragen nach Jobs-Datensatz zur Vorausfüllung -->

    $result = query("SELECT * FROM kategorien WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    ?>
    <form action="kategorien_bearbeiten.php?id=<?php echo $row["id"]?>" method="post">
        <div>
            <lable for="kategorien">Titel:</lable>
            <input type="text" name="kategorien" id="kategorien" value="<?php 
            if (!$erfolg && !empty($_POST["kategorien"])){
                //für den Fehlerfall - alter/flascher Wert wird wieder in das Feld geschrieben
                echo htmlspecialchars($_POST["kategorien"]);
            } else { // Datenbankwert wird in das Feld eingetragen (Vorausfüllung)
            echo htmlspecialchars($row["kategorien"]);
             }
             
             ?>" />
        </div>

        

       
 <button type="submit">Kategorie speichern</button>
    </form>

    <a href='jobs_liste.php'>Zurück zur Kategorien Liste</a>

    <?php
include "../fuss.php";
?>