<?php



use WIFI\JWE\Container;
use WIFI\JWE\Container2;
use WIFI\JWE\Frachtschiff;

//autoloader für namespaces und use inkludiert
spl_autoload_register(
    function (string $klasse) {
    
        $prefix = "WIFI\\JWE\\"; 

        //Basisverzeichnis für das Projekt 
        $basis = __DIR__ . "/";

        $leange = strlen($prefix); 
        if (substr($klasse, 0, $leange) !== $prefix ) {
            return;
        }

        //Klasse ohne Prefix
        $klasse_ohne_prefix = substr($klasse, $leange);
        
        //Dateipfad erstellen
        $datei =$basis . $klasse_ohne_prefix . ".php"; //Dateipfad für autoloader
        $datei = str_replace("\\", "/", $datei);

        //Wenn die Datei existiert, einbinden
        if (file_exists($datei)) {
            include $datei;

        }
    }
);




//Prüfung ob rechnen() funktioniert. CONTAINER


//CONAINER 1

//Gewicht (Nutzlast und Leer)
echo "<strong> Container 1 </strong>";
echo "<br>";
$container = new Container("Cont1");
echo $container->rechnen();
echo "<br>";


//IST Gewicht
$container = new Container("Cont1");
echo $container->rechnen_ist();
echo "<br>";
echo "<br>";
echo "<br>";



//CONTAINER 2

//Gewicht (Nutzlast und Leer)
echo "<strong> Container 2 </strong>";
echo "<br>";
$container2 = new Container2("Cont2");
echo $container2->rechnen();
echo"<br>";


//IST Gewicht
$container2 = new Container2("Cont1");
echo $container2->rechnen_ist();
echo "<br>";
echo "<br>";
echo "<br>";





//Prüfen ob rechnen2() funkt Frachtschiff

$frachtschiff = new Frachtschiff(50); 
echo $frachtschiff->rechnen2();
echo"<br>";


echo "<br>";
//ex catchen 1


$random = 20;

try{
  $container->rechnen_ist($random);
  echo "Das  " . $container->rechnen_ist() . " ist Ok.";
  echo"<br>";

} catch (Exception $ex) {
  echo "Da war was falsch: " . $ex->getMessage();
  echo"<br>";

} finally { 
  echo "Ende der Exception. <br>"; // Dieser Code wird immer ausgeführt 
}



echo "<br>";
//ex catchen 2

$random = 10;

try{
  $container2->rechnen_ist($random);
  echo "Das  " . $container2->rechnen_ist() . " ist Ok.";
  echo"<br>";

} catch (Exception $ex) {
  echo "Da war was falsch: " . $ex->getMessage();
  echo"<br>";

} finally { 
  echo "Ende der Exception. <br>"; // Dieser Code wird immer ausgeführt 
}

// ?>




<!DOCTYPE html>
<html>
    <head>
        <title>PHP 3 Praxisprüfung</title>
        <meta charset='utf-8' />
    </head>
    <body>
        <h2>Container testen</h2>

        <?php

        $warengewicht = 12.55;
        // Irgendeinen Container mit $warengewicht erstellen
        // und Ist-Gewicht, sowie maximales Gesamtgewicht ausgeben

        ?>





        <h2>Frachtschiff testen</h2>
        <?php
        if (!empty($_POST)) {
            // - Frachtschiff erstellen geschw.
            // - Gegebene Anzahl an Container hinzufügen (for-Schleife)
            // - Reisezeit, Anzahl Container, geladenes Gewicht ausgeben (echo)

            for ($i = 1; $i <= $_POST["anzahl_container"]; $i++) {
                // Container dem Schiff hinzufügen - (ein container hinzufügen)

            }

        }
        ?>
        <form action='index.php' method='post'>
            <div>
                <label for='geschwindigkeit'>Geschwindigkeit in km/h:</label>
                <input type='number' name='geschwindigkeit' id='geschwindigkeit' min='0.0' max='100.0' step='0.1' value='<?php
                  if (!empty($_POST["geschwindigkeit"])) {
                    echo $_POST["geschwindigkeit"];
                  } else {
                    echo 23;
                  } ?>' />
            </div>
            <div>
                <label for='strecke'>Strecke in km:</label>
                <input type='number' name='strecke' id='strecke' min='0' max='40000' step='1' value='<?php
                  if (!empty($_POST["strecke"])) {
                    echo $_POST["strecke"];
                  } else {
                    echo 4669;
                  } ?>' />
            </div>
            <div>
                <label for='anzahl_container'>Anzahl Container:</label>
                <input type='number' name='anzahl_container' id='anzahl_container' min='0' max='10000' step='1' value='<?php
                  if (!empty($_POST["anzahl_container"])) {
                    echo $_POST["anzahl_container"];
                  } else {
                    echo 8400;
                  } ?>' />
            </div>
            <div>
                <label for='gewicht_container'>Warengewicht je Container:</label>
                <input type='number' name='gewicht_container' id='gewicht_container' min='0.0' max='100.0' step='0.01' value='<?php
                  if (!empty($_POST["gewicht_container"])) {
                    echo $_POST["gewicht_container"];
                  } else {
                    echo 8.64;
                  } ?>' />
            </div>
            <div>
                <button type='submit'>Berechnen</button>
            </div>
        </form>
    </body>
</html>
