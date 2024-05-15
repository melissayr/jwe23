<?php
include "funktionen.php";
ist_eingeloggt();

$erfolg = false;

$sql_id = escape($_GET["id"]);

//wurde das formular abeschickt
if (!empty($_POST)){

    $sql_titel = escape($_POST["titel"]);
    $sql_kcal_pro_100 = escape( $_POST["kcal_pro_100"]);
    $sql_menge = escape( $_POST["menge"]);
    $sql_einheit = escape( $_POST["einheit"]);
    //erstmal alles escapen um SQL Injection zu vermeiden! 


    //Validierung der Felder
    
    if(empty($sql_titel)) {
        $errors[] = "Bitte gebe einen Namen für die Zutat an";
        } else {
            //Überprüfe ob eine Zutat mit dem  selben Titel bereits existiert
            $result = query("SELECT * FROM zutaten WHERE titel = '{$sql_titel}' AND id != '{$sql_id}' ");  

            //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn die Zutaten bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Diese Zutat existiert bereits";


          } 
        }

            //Wenn keine Fehler existieren, dann können wir di Zutat in der db aktualisieren
            if (empty($errors)) {

                if ($sql_kcal_pro_100 == "") {
                $sql_kcal_pro_100 = "NULL"; // Wenn eine Zutat keine kcal hat, setze auf NULL
                }

                if ($sql_einheit == "") {
                $sql_einheit = "NULL"; //  setze auf NULL wenn leer
                }



            query(" UPDATE zutaten SET 
            titel = '{$sql_titel}',
            kcal_pro_100 = '{$sql_kcal_pro_100}',
            menge = '{$sql_menge}',
            einheit = '{$sql_einheit}'
            WHERE id='{$sql_id}'
            ") ;

            $erfolg = true;
        }
    }










include "kopf.php";
?>
<h1>Zutaten Bearbeiten</h1>
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
        echo "<p>Zutat erfolgreich bearbeitet!</p> - <a href='zutaten_liste.php'>Zurück zur Liste</a></p>";
    }
    


    // <!-- Datenbank fragen nach Zutat-Datensatz zur Vorausfüllung -->

    $result = query("SELECT * FROM zutaten WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    ?>
    <form action="zutaten_bearbeiten.php?id=<?php echo $row["id"]?>" method="post">
        <div>
            <lable for="titel">Zutat:</lable>
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
            <lable for="kcal_pro_100">kcal/100:</lable>
            <input type="number" name="kcal_pro_100" id="kcal_pro_100" value="<?php 
                if (!$erfolg && !empty($_POST["kcal_pro_100"])) {
                    echo htmlspecialchars($_POST["kcal_pro_100"]);
                } else {
                    echo htmlspecialchars($row["kcal_pro_100"]); 
                 }?>" />
        </div>

        <div>
            <lable for="menge">Menge:</lable>
            <input type="number" name="menge" id="menge" value="<?php 
                if (!$erfolg && !empty($_POST["menge"])) {
                    echo htmlspecialchars($_POST["menge"]);
                } else {
                    echo htmlspecialchars($row["menge"]);
                     }?>" />
        </div>
        <div>
            <lable for="einheit">Einheit:</lable>
            <input type="text" name="einheit" id="einheit" value="<?php 
                if (!$erfolg && !empty($_POST["einheit"])){
                    echo htmlspecialchars($_POST["einheit"]);
                } else {
                    echo htmlspecialchars($row["einheit"]);
                } ?>" />

        <div><button type="submit">Zutat speichern</button></div>
    </form>

    <?php include "fuss.php" ?>
