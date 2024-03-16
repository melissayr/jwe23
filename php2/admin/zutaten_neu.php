<?php
// fragen ob eingeloggt nur dann kann man anlegen
include "funktionen.php";
ist_eingeloggt();

$errors = array();



//prüfen ob formular abgeschickt wurde
if (!empty($_POST)) 
{
    $sql_titel = escape( $_POST["titel"]);
    $sql_kcal_pro_100 = escape( $_POST["kcal_pro_100"]);
    $sql_menge = escape( $_POST["menge"]);
    $sql_einheit = escape( $_POST["einheit"]);


    //Felder validieren
    if(empty($sql_titel)) {
        $errors[] = "Bitte gebe einen Namen für die Zutat an";
        } else {

            //überprüfen ob es die zutat bereits gibt
            $result = query("SELECT * FROM zutaten WHERE titel = '{$sql_titel}' "); // $db in funktionen 

                    //Datensatz aus mysqli in ein php array umwandeln
            $row = mysqli_fetch_assoc($result);

            //Wenn die Zutaten bereits existiert -> Fehlermeldung bzw Hinweis
            if ($row) {$errors[]="Diese Zutat existiert bereits";}
        } 

        if (empty($errors)) {

            if ($sql_kcal_pro_100 == "") {
                $sql_kcal_pro_100 = "NULL"; // Wenn eine Zutat keine kcal hat, setze auf NULL
            }

            if ($sql_einheit == "") {
                $sql_einheit = "NULL"; //  setze auf NULL wenn leer
            }



            query("INSERT INTO zutaten SET 
            titel = '{$sql_titel}',
            kcal_pro_100 = {$sql_kcal_pro_100},
            menge = '{$sql_menge}',
            einheit = {$sql_einheit} ") ;
        }
}

?>


<body>


    <h1>Neue Zutat anlegen</h1>

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

    ?>

    <form action="zutaten_neu.php" method="post">
        <div>
            <lable for="titel">Zutat:</lable>
            <input type="text" name="titel" id="titel" />
        </div>

        <div>
            <lable for="kcal_pro_100">kcal/100:</lable>
            <input type="number" name="kcal_pro_100" id="kcal_pro_100" />
        </div>

        <div>
            <lable for="menge">Menge:</lable>
            <input type="number" name="menge" id="menge" />
        </div>
        <div>
            <lable for="einheit">Einheit:</lable>
            <input type="text" name="einheit" id="einheit" />
        </div>

        <div><button type="submit">Zutat anlegen</button></div>
    </form>

    
</body>
