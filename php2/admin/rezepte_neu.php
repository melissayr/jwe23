<?php
// fragen ob eingeloggt nur dann kann man anlegen
include "funktionen.php";
ist_eingeloggt();

$errors = array();

$erfolg = false;


//prüfen ob formular abgeschickt wurde
if (!empty($_POST)) 
{   $sql_benutzer_id = escape( $_POST["benutzer_id"]);
    $sql_titel = escape( $_POST["titel"]);
    $sql_beschreibung = escape( $_POST["beschreibung"]);



    //Felder validieren
    if(empty($sql_titel)) {
        $errors[] = "Bitte gebe einen Namen für dieses Rezept an";
        } else {

            //überprüfen ob es die zutat bereits gibt
            $result = query("SELECT * FROM rezepte WHERE titel = '{$sql_titel}' "); // $db in funktionen 

                    //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn die Zutaten bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Dieses Rezept existiert bereits";}
        } 



        if (empty($errors)) {

            // query("INSERT INTO zutaten SET
            // titel = '{$sql_titel}',
            // kcal_pro_100 = {$sql_kcal_pro_100},
            // menge = '{$sql_menge}',
            // einheit = '{$sql_einheit}' ") ;


            //Wenn keine validierungsfehler ->DB speichern

            query("INSERT INTO rezepte SET
             titel = '{$sql_titel}',
             beschreibung = '{$sql_beschreibung}', 
             benutzer_id = '{$sql_benutzer_id}' 
             ");
        
            $erfolg = true;
        }
}

?>


<body>


    <h1>Neues Rezept anlegen</h1>

    <?php 
    include "kopf.php";
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
        echo "<p>Rezept erfolgreich angelegt. <a href='rezepte_liste.php'>Zurück zur Zutaten Liste</a></p>";
    }




    ?>

    <form action="rezepte_neu.php" method="post">
        <div><lable for="benutzer_id">Benutzer:</lable>
        <select name="benutzer_id" id="benutzer_id">
        
<?php
           $user_result = query("SELECT id, benutzername FROM benutzer ORDER BY benutzername ASC");
           while ($user = mysqli_fetch_assoc($user_result)) {
            echo "<option value='{$user["id"]}' ";

            if (empty($_POST["benutzer_id"]) && $user["id"] == $_SESSION["benutzer_id"]) {

                echo "selected";

            } else if ( !empty($_POST["benutzer_id"]) && !$erfolg && $_POST["benutzer_id"] == $user["id"]) {
                echo "selected";
            }
            echo ">{$user["benutzername"]} </option>";
           }
          
?>
        
    </select>
</div>
        <div>
            <lable for="titel">Titel:</lable>
            <input type="text" name="titel" id="titel" value="<?php if (!empty($_POST["titel"])&& !$erfolg ) {
                echo htmlspecialchars($_POST["titel"]);
            }?>" />
        </div>

        <div>
            <lable for="beschreibung">Beschreibung</lable>
            <textarea type="text" name="beschreibung" id="beschreibung"  ><?php if (!empty($_POST["titel"])&& !$erfolg ) {
                echo htmlspecialchars($_POST["beschreibung"]);
            }?></textarea>
        </div>

        <div><button type="submit">Rezept anlegen</button></div>
    </form>

    
</body>
