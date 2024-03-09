<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionen für Arrays</title>
</head>
<body>
    <h1>Funktionen für Arrays</h1>

    <!-- ALLE FUNKTIONEN AUF PHP.NET! -->

    <?php
    $namen = array("Peter", "Franziska", "Mario", "Katharina", "Franziska", "Christian", "Katharina", "Markus");

    //Elemente (Werte) in einem Array zählen

    echo count($namen);
    echo "<br/>";

    //Zufälligen Namen ausgeben
    // echo array_rand($namen);
    $index = array_rand($namen);
    echo $index;
    echo "<br/>";

    //echo $namen[array_rand($namen)];
    echo $namen[$index];
    echo "<br/>";


    echo"<pre>";
    print_r($namen);
    echo"</pre>";
    echo count($namen); //zählen der namen im array

    //Doppelte Namen entfernen mit array uniqe
    $eindeutig = array_unique(
        $namen
    );


     //Prüpfen ob ein Wert im Array existiert  !!!kann zum prüfen auf doppelte benutzernamen verwendet werden -> wenn gesuchterName existiert, dann "Passwort oder Name falsch"!!!!
     $gesuchterName = "Peter";
     echo "<br/>";
     if (in_array($gesuchterName, $namen)) {
         echo "$gesuchterName ist enthalten";
     } else {
         echo "$gesuchterName ist nicht enthalten";
     }

    echo"<pre>";
    print_r($eindeutig);
    echo"</pre>";
    echo count($eindeutig); //zählen der namen im array

    // ACHTUNG INDEX MUSS NEU VERGEBEN WERDEN mit sort
    echo "<br/>";
    echo "<br/>";

    //Prüfen ob ein Wert im Array existiert

    if (in_array("Heidi", $namen)) {
        echo "Heidi ist dabei";
    } 
    else {
        echo "Heidi ist nicht dabei";
    } 

    echo "<br/>";
    echo "<br/>";

    // Aufsteigend nach Namen sortieren asort
    asort($eindeutig);
    echo"<pre>";
    print_r($eindeutig);
    echo"</pre>";

    echo "<br/>";
    echo "<br/>";

    //Werte Nachhinein hinzufügen
    $eindeutig[] = "Herbert";
    array_push($eindeutig, "Julia", "Fritz");
    echo"<pre>";
    print_r($eindeutig);
    echo"</pre>";

    echo "<br/>";
    echo "<br/>";

    //Sortieren und neue Indizies zuweisen sort
    sort($eindeutig);
    echo"<pre>";
    print_r($eindeutig);
    echo"</pre>";
























    ?>

    
</body>
</html>