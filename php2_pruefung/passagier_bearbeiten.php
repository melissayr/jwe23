<?php

include "funktionen.php";

$erfolg = false;

$sql_id = escape($_GET["id"]);


//wurde das formular abeschickt
if (!empty($_POST)){

    // $sql_id = escape($_POST["id"]);
    $sql_vorname = escape( $_POST["vorname"]);
    $sql_nachname = escape( $_POST["nachname"]);
    $sql_geburtstag = escape( $_POST["geburtstag"]);
    // $sql_flugangst = escape( $_POST["flugangst"]);



    //erstmal alles escapen um SQL Injection zu vermeiden! 


    //Validierung der Felder
    
    if(empty($sql_id)) {
        $errors[] = "";
        } else {
            //Überprüfe ob eine Zutat mit dem  selben Titel bereits existiert
            $result = query("SELECT * FROM passagiere WHERE nachname = '{$sql_nachname}' AND id != '{$sql_id}' ");  

            //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn die Zutaten bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Dieser Passagier existiert bereits";


          } 
        }

            //Wenn keine Fehler existieren, dann können wir di Zutat in der db aktualisieren
            if (empty($errors)) {



            query("UPDATE passagiere SET 
            vorname = '{$sql_vorname}',
            nachname = '{$sql_nachname}',
            geburtstag = '{$sql_geburtstag}'
            -- flugangst = '{$sql_flugangst}' '
            WHERE id='{$sql_id}'
            ") ;

            $erfolg = true;
        }
    }




include "kopf.php";
?>
<h1>Passagier Bearbeiten</h1>
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
        echo "<p>Passagier erfolgreich bearbeitet!</p> - <a href='passagier_liste.php'>Zurück zur Liste</a></p>";
    }
    


    
    $result = query("SELECT * FROM passagiere WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    ?>
    <form action="passagier_bearbeiten.php?id=<?php echo $row["id"]?>" method="post">
        <p>Passagier</p>

        <div>
            <lable for="vorname">Vorname:</lable>
            <input type="text" name="vorname" id="vorname" value="<?php 
                if (!$erfolg && !empty($_POST["vorname"])) {
                    echo htmlspecialchars($_POST["vorname"]);
                } else {
                    echo htmlspecialchars($row["vorname"]); 
                 }?>" />
        </div>

        <div>
            <lable for="nachname">Nachname:</lable>
            <input type="text" name="nachname" id="nachname" value="<?php 
                if (!$erfolg && !empty($_POST["nachname"])) {
                    echo htmlspecialchars($_POST["nachname"]);
                } else {
                    echo htmlspecialchars($row["nachname"]);
                     }?>" />
        </div>
        <div>
            <lable for="geburtstag">Geburtstag:</lable>
            <input type="text" name="geburtstag" id="geburtstag" />
        </div>


            <div class='checkbox'>
				<input type='checkbox' id='toc' name='agb' />
				<label for='toc'>Flugangst? </label>
			</div>

        <div><button type="submit">Passagier speichern</button></div>
    </form>

    <?php include "fuss.php" ?>
