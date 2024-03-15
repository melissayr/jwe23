<?php
// fragen ob eingeloggt nur dann kann man anlegen
include "funktionen.php";
ist_eingeloggt();

$errors = array();

include "kopf.php";

//prüfen ob formular abgeschickt wurde
if (!empty($_POST)) 
{
    $sql_titel = escape( $_POST["titel"]);



    //Felder validieren
    if(empty($_POST["titel"])) {
        $errors[] = "Bitte gebe einen Namen für die Zutat an";
        }
}

?>


<body>
    <h1>Neue Zutat anlegen</h1>

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
