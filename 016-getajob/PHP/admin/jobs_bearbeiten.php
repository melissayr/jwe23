<!-- Link zum css -->
<link href="style.css" rel="stylesheet" type="text/css" />
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

    $sql_titel = escape($_POST["titel"]);
    $sql_jobs = escape( $_POST["jobs"]);
    $sql_kategorie_id = escape( $_POST["kategorie_id"]);
    //erstmal alles escapen um SQL Injection zu vermeiden! 


    //Validierung der Felder
    
    if(empty($sql_titel)) {
        $errors[] = "Bitte gebe einen Titel für den Beruf an";
        } else {
            //Überprüfe ob ein Beruf mit dem  selben Titel bereits existiert
            $result = query("SELECT * FROM jobs WHERE titel = '{$sql_titel}' AND id != '{$sql_id}' ");  

            //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn der Job bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Dieser Job existiert bereits";


          } 
        }

            //Wenn keine Fehler existieren, dann können wir den Job in der db aktualisieren
            if (empty($errors)) {

                if ($sql_titel == "") {
                    $sql_titel == "NULL"; // Wenn Titel leer dann null
                }




            query(" UPDATE jobs SET
            titel = '{$sql_titel}',
            jobs = '{$sql_jobs}',
            kategorie_id = '{$sql_kategorie_id}'
            WHERE id='{$sql_id}'
            ") ;

            $erfolg = true;
        }
    }

?>
<h1>Jobs Bearbeiten</h1>
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
        echo "<p style='color:green'>Job erfolgreich bearbeitet!</p> - <a href='jobs_liste.php'>Zurück zur Liste</a></p>";
    }
    


    // <!-- Datenbank fragen nach Zutat-Datensatz zur Vorausfüllung -->

    $result = query("SELECT * FROM jobs WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    ?>
    <form action="jobs_bearbeiten.php?id=<?php echo $row["id"]?>" method="post">
        <div>
            <lable for="titel">Titel:</lable>
            <input type="text" name="titel" id="titel" value="<?php 
            if (!$erfolg && !empty($_POST["titel"])){
                //für den Fehlerfall - alter/flascher Wert wird wieder in das Feld geschrieben
                echo htmlspecialchars($_POST["titel"]);
            } else { // Datenbankwert wird in das Feld eingetragen (Vorausfüllung)
            echo htmlspecialchars($row["titel"]);
             }
             
             ?>" />
        </div>

        <div>
            <lable for="jobs">Beschreibung:</lable>
            <input type="text" name="jobs" id="jobs" value="<?php 
                if (!$erfolg && !empty($_POST["jobs"])) {
                    echo htmlspecialchars($_POST["jobs"]);
                } else {
                    echo htmlspecialchars($row["jobs"]); 
                 }?>" />
        </div>

        <div>
            <lable for="kategorie_id">Kategorie:</lable>
            <input type="number" name="kategorie_id" id="kategorie_id" value="<?php 
                if (!$erfolg && !empty($_POST["kategorie_id"])) {
                    echo htmlspecialchars($_POST["kategorie_id"]);
                } else {
                    echo htmlspecialchars($row["kategorie_id"]);
                     }?>" />

                     </div>

                     <div>
                     <lable for="qualifikation">Qualifikation:</lable>
                     <input type="text" name="qualifikation" id="qualifikation" value="<?php 
                         if (!$erfolg && !empty($_POST["qualifikation"])) {
                             echo htmlspecialchars($_POST["qualifikation"]);
                         } else {
                             echo htmlspecialchars($row["qualifikation"]);
                              }?>" />
                              </div>

                            <div>
                              <lable for="dienstort">dienstort:</lable>
                              <input type="text" name="dienstort" id="dienstort" value="<?php 
                                  if (!$erfolg && !empty($_POST["dienstort"])) {
                                      echo htmlspecialchars($_POST["dienstort"]);
                                  } else {
                                      echo htmlspecialchars($row["dienstort"]);
                                       }?>" /> </div>

                                       <div>
                                       <lable for="stundenausmaß">stundenausmaß:</lable>
                                       <input type="number" name="stundenausmaß" id="stundenausmaß" value="<?php 
                                           if (!$erfolg && !empty($_POST["stundenausmaß"])) {
                                               echo htmlspecialchars($_POST["stundenausmaß"]);
                                           } else {
                                               echo htmlspecialchars($row["stundenausmaß"]);
                                                }?>" /> </div>
                                        
                                       <div>
                                       <lable for="mindestgehalt_euro">mindestgehalt_euro:</lable>
                                       <input type="number" name="mindestgehalt_euro" id="mindestgehalt_euro" value="<?php 
                                           if (!$erfolg && !empty($_POST["mindestgehalt_euro"])) {
                                               echo htmlspecialchars($_POST["mindestgehalt_euro"]);
                                           } else {
                                               echo htmlspecialchars($row["mindestgehalt_euro"]);
                                                }?>" /></div>
       
 <button type="submit">Job speichern</button>
    </form>

    <?php
include "../fuss.php";
?>